<?php

namespace Customize\Repository;

use Eccube\Doctrine\Query\QueryCustomizer;
use Eccube\Doctrine\Query\WhereClause;
use Eccube\Repository\QueryKey;
use Doctrine\ORM\QueryBuilder;
use Eccube\Repository\TagRepository;

/**
 * Description of TagSearchCustomizer
 *
 * @author Akira Kurozumi <info@a-zumi.net>
 */
class TagSearchCustomizer implements QueryCustomizer {

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    /**
     * 検索のパラメータにtag_idを追加
     */
    public function customize(QueryBuilder $builder, $params, $queryKey)
    {
        dump($params);
        if (!empty($params['tag_id']) && $params['tag_id']) {
            $builder->innerJoin('p.ProductTag', 'pt');
            $builder->andWhere('pt.Tag = :tag_id');
            $builder->setParameter('tag_id', $params['tag_id']);
        }
    }
 
    public function getQueryKey(): string
    {
        return QueryKey::PRODUCT_SEARCH;
    }

}
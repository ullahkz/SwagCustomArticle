{extends file="parent:frontend/detail/content/header.tpl"}

{block name='frontend_detail_index_name'}
    {$smarty.block.parent}
    <h1 class="product--title" itemprop="name">
        {$sArticle.articleName}{debug}
    </h1>
{/block}



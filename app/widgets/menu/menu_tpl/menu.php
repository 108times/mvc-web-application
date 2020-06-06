<?php $parent = isset($category['children']); ?>
<li class="nav-item <?=$parent ? "dropdown": "" ?>">

    <a class="nav-link <?=$parent ? "dropdown-toggle": "" ?>"
    href="<?=$parent ? '#' : $category['alias'];?>"
    id="dropdown<?=$category['id']?>"
    <?=$parent ? 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'' ?>>
    <?=$category['title'];?>
    </a>

        <?php if( $parent ): ?>
         <div class="dropdown-menu shadow" aria-labelledby="dropdown<?=$category['id']?>">
            <?php $this->getMenuHtml($category['children']); ?>
         </div>
        <?php endif; ?>
</li>



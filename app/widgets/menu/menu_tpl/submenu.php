<?php $parent = isset($category['children']); ?>
<?php $dropdown = $parent ? 1 : 0; ?>
<?php $link = $this->tableLinks ? $this->table . '/' . $category['alias'] : '' ?>
<li class="nav-item <?=$dropdown ? "dropdown": "" ?>">

    <a class="nav-link <?=$dropdown ? "dropdown-toggle": "" ?>"
    href="<?=$dropdown ? '#' : $link ;?>"
    <?=$dropdown ? "id='dropdown$id'":''?>
    <?=$dropdown ? 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'' ?>>
    <?=$category['title'];?>
    </a>

        <?php if( $parent ): ?>
         <div class="dropdown-menu shadow" aria-labelledby="dropdown<?=$id?>">
            <?php $this->getMenuHtml($category['children']); ?>
         </div>
        <?php endif; ?>

</li>


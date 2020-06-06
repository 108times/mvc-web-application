<?php $parent = isset($category['children']); ?>
<?php $own_table = $category['a_table'];?>
<?php $dropdown = $parent || $own_table ? 1 : 0; ?>
<?php $link = $this->tableLinks ? $this->table . '/' . $category['alias'] : '' ?>
<li class="nav-item <?=$dropdown ? "dropdown": "" ?>">

    <a class="nav-link <?=$dropdown ? "dropdown-toggle": "" ?>"
    href="<?=$dropdown ? '#' : $link ;?>"
    <?=$dropdown ? "id='dropdown-{$category['title']}-$id' ":''?>
    <?=$dropdown ? 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'' ?>>
    <?=$category['title'];?>
    </a>

        <?php if( $parent && !$own_table ) { ?>
         <div class="dropdown-menu shadow" aria-labelledby="dropdown<?='-'.$category['title'] .'-'.$id?>">
            <?php $this->getMenuHtml($category['children']); ?>
         </div>
        <?php } else ?>

        <?php if( !$parent && $own_table ): ?>
          <?php
           $submenu = new \app\widgets\menu\Menu([
                  'table'=>$category['a_table'],
                  'container'=>'div',
                  'tpl'=>__DIR__ . "/submenu.php",
                  'class'=>'dropdown-menu shadow submenu',
                  'cacheKey'=>"{$category['a_table']}_menu",
                  'tableLinks'=>1,
                  'cache'=>'0',
                  'attrs'=>[
                  'aria-labelledby'=>"dropdown-{$category['title']}-$id",
                  ]
            ]);
            $this->submenuHtml = $submenu->menuHtml;
            ?>
        <?php endif; ?>
</li>



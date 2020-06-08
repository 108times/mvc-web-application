<?php $parent = isset($category['children']); ?>
<?php @$own_table = $category['a_table'];?>
<?php $dropdown = $parent || $own_table ? 1 : 0; ?>
<?php $link = $this->tableLinks ? $this->table . '/' . $category['alias'] : PATH . "/". $category['alias'] ?>
<li class="nav-item <?=$dropdown ? "dropdown": "" ?> <?=$this->mainClass ?>__item" >

    <a class="nav-link <?=$dropdown ? "dropdown-toggle": "" ?>"
    href="<?=$link?>"
    <?=$dropdown ? "id='dropdown-{$category['title']}-$id' ":''?>
    <?=$dropdown ? 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'' ?>>
    <?=$category['title'];?>
    </a>

        <?php if( $parent && !$own_table ) { ?>
         <div class="dropdown-menu sidemenu shadow" aria-labelledby="dropdown<?='-'.$category['title'] .'-'.$id?>">
            <?php  ?>
            <?php echo $this->getMenuHtml($category['children']); ?>
         </div>
        <?php } else ?>

        <?php if( !$parent && $own_table ): ?>
        <?php
           new \app\widgets\menu\Menu([
                  'table'=>$category['a_table'],
                  'container'=>'div',
                  'tpl'=>__DIR__ . "/submenu.php",
                  'class'=>'dropdown-menu shadow submenu',
                  'mainClass'=>$category['a_table'].'-menu',
                  'cacheKey'=>"{$category['a_table']}_menu",
                  'tableLinks'=>1,
                  'cache'=>'3600',
                  'attrs'=>[
                  'aria-labelledby'=>"dropdown-{$category['title']}-$id",
                  ]
            ]); ?>
        <?php endif; ?>
</li>



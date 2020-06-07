<?php $parent = isset($category['children']); ?>
<?php $dropdown = $parent ? 1 : 0; ?>

<?php $link = $this->tableLinks ? $this->table . '/' . $category['alias'] : '' ?>
<li class="nav-item <?=$dropdown ? "dropdown": '' ?> dropdown-<?=$usecustomtpl ?>__item  <?=$this->mainClass ?>__item " >

    <a class="nav-link <?=$dropdown ? "dropdown-toggle": "" ?>"
    href="<?= $link ?>"
    <?=$dropdown ? "id='dropdown$id'":''?>
    <?=$dropdown ? 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'' ?>>
    <?=$category['title'];?>
    </a>

        <?php if( $parent ): ?>
         <div class="dropdown-menu sidemenu shadow" aria-labelledby="dropdown<?=$id?>">

            <?php $newtpl = __DIR__ .'/subsubmenu.php'; ?>
            <?php echo $this->getMenuHtml($category['children'],'',true,$newtpl,$id); ?>
         </div>
        <?php endif; ?>

</li>

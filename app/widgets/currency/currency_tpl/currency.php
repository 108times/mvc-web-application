<li class="nav-item dropdown currency-list">
    <a class='nav-link dropdown-toggle currency-widget-current' href="#" id="currency-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $this->currency['code'] ?>
    </a>
    <div class="dropdown-menu shadow" aria-labelledby="currency-dropdown">
        <?php foreach($this->currencies as $k=>$v): ?>
            <?php if($k != $this->currency['code']): ?>
                <a href="#" class="dropdown-item currency-widget-item" onclick="javascript:changeCurrency('<?=$k?>');"><?=$k?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</li>

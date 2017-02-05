<?php
/* @var string|false $directoryAsset */
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => Yii::t('app', 'Containers'),
                        'url' => ['container/index'],
                        'active' => Yii::$app->controller->id == 'container'
                    ],
                    [
                        'label' => Yii::t('app', 'Category Limits'),
                        'url' => ['category-limit/index'],
                        'active' => Yii::$app->controller->id == 'category-limit'
                    ],
                    [
                        'label' => Yii::t('app', 'Transactions'),
                        'url' => ['transaction/index'],
                        'active' => Yii::$app->controller->id == 'transaction'
                    ],
                    [
                        'label' => Yii::t('app', 'Categories'),
                        'url' => ['category/index'],
                        'active' => Yii::$app->controller->id == 'category'
                    ],
                    [
                        'label' => Yii::t('app', 'Currency'),
                        'url' => ['currency/index'],
                        'active' => Yii::$app->controller->id == 'currency'
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

<?php
		use Cake\Core\Configure;
		return [ 'Menu' =>
                 [
                   'Users' => [
                       'link' => '#',
                       'class' => 'fa-list-alt',
                       'children' => [
                               'View All' => [
                                   'link' => [
                                         'controller' => 'Users',
                                         'action' => 'index'
                                       ],
                                     ],
                               'Add' => [
                                   'link' => ['controller' => 'Users', 'action' => 'add']
                                     ]
                             ],
                       ], 
                    'Posts' => [
                       'link' => ['controller' => 'Posts', 'action' => 'index'],
                       'class' => 'fa-list-alt',
                       ]
                  ]
               ]
        ?>
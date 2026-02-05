<?php
add_filter('facetwp_facet_sort_options', function (array $options, array $params): array {
    if (empty($params['facet']['name']) || 'sort_firm' !== $params['facet']['name']) {
        return $options;
    }

    $options['etude'] = array(
        'label'      => __('Par étude', 'dc26-oav'),
        'query_args' => array(
            'orderby'  => 'taxonomy',
            'tax_name' => 'etude',
            'tax_orderby' => 'name',
            'order'       => 'desc',
        ),
    );

    return $options;
}, 10, 2);

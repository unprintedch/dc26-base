<?php
/**
 * Examen listing block template.
 *
 * Displays all exam years with a dropdown filter (most recent year
 * shown by default). Each year contains its sessions in a grid,
 * with downloadable documents.
 *
 * @param array $block The block settings and attributes.
 */
declare(strict_types=1);

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'dc26-examen-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

if ( is_admin() ) : ?>
    <div class="dc26-examen-listing__preview">
        <p><?php echo esc_html__( 'Bloc Sessions d\'examens', 'dc26-oav' ); ?></p>
        <p><?php echo esc_html__( 'Le filtre par année et les sessions seront visibles sur le front.', 'dc26-oav' ); ?></p>
    </div>
    <?php return;
endif;

$examen_query = new WP_Query( [
    'post_type'      => 'examen',
    'posts_per_page' => -1,
    'post_status'    => [ 'publish', 'private' ],
    'orderby'        => 'title',
    'order'          => 'DESC',
] );

if ( ! $examen_query->have_posts() ) : ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
        <p class="dc26-examen-listing__empty"><?php echo esc_html__( 'Aucun examen disponible.', 'dc26-oav' ); ?></p>
    </div>
    <?php
    wp_reset_postdata();
    return;
endif;

$years = [];
$posts_data = [];
while ( $examen_query->have_posts() ) {
    $examen_query->the_post();
    $year = get_the_title();
    $years[] = $year;
    $posts_data[] = [
        'year'    => $year,
        'post_id' => get_the_ID(),
    ];
}
wp_reset_postdata();

$icon_base = get_stylesheet_directory_uri() . '/assets/img/';
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">

    <?php if ( count( $years ) > 1 ) : ?>
    <div class="dc26-examen-listing__filter-wrap">
        <label for="dc26-examen-year-select" class="dc26-examen-listing__label">
            <?php echo esc_html__( 'Année', 'dc26-oav' ); ?>
        </label>
        <select id="dc26-examen-year-select" class="dc26-examen-listing__filter">
            <?php foreach ( $years as $y ) : ?>
                <option value="<?php echo esc_attr( $y ); ?>"><?php echo esc_html( $y ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>

    <?php foreach ( $posts_data as $index => $item ) :
        $post_id = $item['post_id'];
        $year    = $item['year'];
        $hidden  = $index > 0 ? ' is-hidden' : '';
    ?>
    <div class="dc26-examen-listing__year<?php echo $hidden; ?>" data-year="<?php echo esc_attr( $year ); ?>">

        <h2 class="dc26-examen-listing__year-title"><?php echo esc_html( $year ); ?></h2>

        <?php if ( have_rows( 'session', $post_id ) ) : ?>
        <div class="dc26-examen-listing__sessions">
            <?php while ( have_rows( 'session', $post_id ) ) : the_row(); ?>
            <div class="dc26-examen-session">
                <?php
                $titre     = get_sub_field( 'titre' );
                $exam_date = get_sub_field( 'exam_date' );
                ?>

                <?php if ( $titre ) : ?>
                    <h3 class="dc26-examen-session__title"><?php echo esc_html( $titre ); ?></h3>
                <?php endif; ?>

                <?php if ( $exam_date ) : ?>
                    <p class="dc26-examen-session__date">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo esc_html( $exam_date ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( have_rows( 'liens' ) ) : ?>
                <ul class="dc26-examen-session__documents">
                    <?php while ( have_rows( 'liens' ) ) : the_row();
                        $doc_url   = get_sub_field( 'document' );
                        $doc_label = get_sub_field( 'intitule' );
                        if ( ! $doc_url || ! $doc_label ) {
                            continue;
                        }
                    ?>
                    <li>
                        <a class="dc26-examen-doc" href="<?php echo esc_url( $doc_url ); ?>" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                            <?php echo esc_html( $doc_label ); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else : ?>
            <p class="dc26-examen-listing__empty"><?php echo esc_html__( 'Aucune session pour cette année.', 'dc26-oav' ); ?></p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

</div>

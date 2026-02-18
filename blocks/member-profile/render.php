<?php
/**
 * Member profile block template.
 *
 * Displays the profile of the currently logged-in member.
 *
 * @param array $block The block settings and attributes.
 */
declare(strict_types=1);

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'dc26-member-profile';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

if ( is_admin() ) : ?>
    <div class="dc26-member-profile__preview">
        <p><?php echo esc_html__( 'Bloc Profil membre', 'dc26-oav' ); ?></p>
        <p><?php echo esc_html__( 'Le profil du membre connecté sera affiché sur le front.', 'dc26-oav' ); ?></p>
    </div>
    <?php return;
endif;

if ( ! is_user_logged_in() ) : ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
        <p><?php echo esc_html__( 'Veuillez vous connecter pour accéder à votre profil.', 'dc26-oav' ); ?></p>
    </div>
    <?php return;
endif;

$member_post = dc26_get_member_by_user( wp_get_current_user() );

if ( ! $member_post ) : ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
        <p><?php echo esc_html__( 'Aucun profil membre associé à votre compte.', 'dc26-oav' ); ?></p>
    </div>
    <?php return;
endif;

$d              = dc26_get_member_data( $member_post->ID );
$icon_base      = get_stylesheet_directory_uri() . '/assets/img/';
$annuaire_url   = get_permalink( 6608 );
$street_line    = trim( $d['rue'] . ' ' . $d['rue_no'] );
$city_line      = trim( $d['npa'] . ' ' . $d['ville'] );
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="dc26-member-profile__grid">

        <!-- Photo -->
        <div class="dc26-member-profile__photo">
            <?php if ( $d['photo_id'] ) : ?>
                <?php echo wp_get_attachment_image( $d['photo_id'], 'medium', false, [
                    'class' => 'dc26-member-profile__img',
                ] ); ?>
            <?php else : ?>
                <div class="dc26-member-profile__placeholder" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="64" height="64">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
            <?php endif; ?>
        </div>

        <!-- Contact information -->
        <div class="dc26-member-profile__info">
            <h3 class="dc26-member-profile__name">
                <?php echo esc_html( $d['full_name'] ); ?>
            </h3>

            <?php if ( $d['status'] ) : ?>
                <p class="dc26-member-profile__status"><?php echo esc_html( $d['status'] ); ?></p>
            <?php endif; ?>

            <?php if ( $d['etude_name'] && $annuaire_url ) : ?>
                <h4 class="dc26-member-profile__etude">
                    <a href="<?php echo esc_url( $annuaire_url ); ?>?fwp_etude=<?php echo esc_attr( $d['etude_slug'] ); ?>">
                        <?php echo esc_html( $d['etude_name'] ); ?>
                    </a>
                </h4>
            <?php endif; ?>

            <p class="dc26-member-profile__address">
                <?php if ( $d['complement_adresse'] ) : ?>
                    <?php echo esc_html( $d['complement_adresse'] ); ?><br>
                <?php endif; ?>
                <?php if ( $street_line ) : ?>
                    <?php echo esc_html( $street_line ); ?><br>
                <?php endif; ?>
                <?php if ( $d['case_postale'] ) : ?>
                    <?php echo esc_html( $d['case_postale'] ); ?><br>
                <?php endif; ?>
                <?php if ( $city_line ) : ?>
                    <?php echo esc_html( $city_line ); ?>
                <?php endif; ?>
            </p>

            <div class="dc26-member-profile__contact">
                <?php if ( $d['phone'] ) : ?>
                    <a class="dc26-member-profile__pill" href="tel:<?php echo esc_attr( $d['phone'] ); ?>">
                        <img src="<?php echo esc_url( $icon_base . 'phone.svg' ); ?>" alt="" width="16" height="16">
                        <?php echo esc_html( $d['phone'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $d['email'] ) : ?>
                    <a class="dc26-member-profile__pill" href="mailto:<?php echo esc_attr( $d['email'] ); ?>">
                        <img src="<?php echo esc_url( $icon_base . 'envelope.svg' ); ?>" alt="" width="16" height="16">
                        <?php echo esc_html( $d['email'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $d['homepage_url'] ) : ?>
                    <a class="dc26-member-profile__pill" href="<?php echo esc_url( $d['homepage_url'] ); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( $icon_base . 'link.svg' ); ?>" alt="" width="16" height="16">
                        <?php echo esc_html( $d['homepage_label'] ?: $d['homepage_url'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $d['fax'] ) : ?>
                    <span class="dc26-member-profile__pill">
                        <?php echo esc_html__( 'Fax :', 'dc26-oav' ); ?> <?php echo esc_html( $d['fax'] ); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Specialities, languages, commissions -->
        <div class="dc26-member-profile__meta">

            <?php if ( ! empty( $d['specialities_fsa'] ) ) : ?>
                <h4><?php echo esc_html__( 'Spécialisation(s) FSA', 'dc26-oav' ); ?></h4>
                <ul class="dc26-member-profile__tags">
                    <?php foreach ( $d['specialities_fsa'] as $term ) : ?>
                        <li>
                            <a class="dc26-member-profile__tag" href="<?php echo esc_url( $annuaire_url ); ?>?fwp_spcialistes_fsa=<?php echo esc_attr( $term->slug ); ?>">
                                <?php echo esc_html( $term->name ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( ! empty( $d['specialities'] ) ) : ?>
                <h4><?php echo esc_html__( "Domaines d'activités", 'dc26-oav' ); ?></h4>
                <ul class="dc26-member-profile__tags">
                    <?php foreach ( $d['specialities'] as $term ) : ?>
                        <li>
                            <a class="dc26-member-profile__tag" href="<?php echo esc_url( $annuaire_url ); ?>?fwp_specialite=<?php echo esc_attr( $term->slug ); ?>">
                                <?php echo esc_html( $term->name ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( ! empty( $d['languages'] ) ) : ?>
                <h4><?php echo esc_html__( 'Langues', 'dc26-oav' ); ?></h4>
                <ul class="dc26-member-profile__tags">
                    <?php foreach ( $d['languages'] as $term ) : ?>
                        <li>
                            <a class="dc26-member-profile__tag" href="<?php echo esc_url( $annuaire_url ); ?>?fwp_langue=<?php echo esc_attr( $term->slug ); ?>">
                                <?php echo esc_html( $term->name ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( ! empty( $d['commissions'] ) ) : ?>
                <h4><?php echo esc_html__( 'Commissions', 'dc26-oav' ); ?></h4>
                <ul class="dc26-member-profile__commissions">
                    <?php foreach ( $d['commissions'] as $commission ) : ?>
                        <li>
                            <?php echo esc_html( $commission['name'] ); ?>
                            <?php if ( $commission['president'] ) : ?>
                                <em>&ndash; <?php echo esc_html__( 'président(e)', 'dc26-oav' ); ?></em>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>
    </div>
</div>

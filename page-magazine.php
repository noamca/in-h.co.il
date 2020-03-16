<?php

/**
 * Template Name: Magazine
 *
 * @package OZD_Studio
 */

get_header(); ?>

<section class="magazine-contaner">

    <?php  $img = get_field( 'magazine_image' );
    if ( $img ):
    ?>
    
        <div class="magazine-img-wrap">
            <img class="magazine-img" src="<?php echo esc_url( $img ) ?>" alt="magazine image" />
        </div>

    <?php endif; ?>

    <div class="container magazine-content-wrap">
        <div class="meta">
            <?php the_field('magazine_meta') ?>
        </div>

        <h1 class="magazine-heading"><?php the_title( ); ?></h1>

        <?php $intro_text = trim( get_field( 'magazine_intro_text' ) ); if ( $intro_text ): ?>
            <div class="row">
                <div class="col-md-9 intro-text"><?php echo $intro_text; ?></div>
            </div>
        <?php endif; ?>

        <div class="meta-mobile">
            <?php the_field('magazine_meta') ?>
        </div>

        <div class="row">
            <div class="col-md-11 magazine-content">
                <?php the_post(); the_content( ); ?>
            </div>
        </div>

        <?php
            $readmore_txt = trim( get_field( 'magazine_read_more_btn_txt' ) );
            $readmore_link = trim( get_field( 'magazine_read_more_btn_link' ) );
            if ( $readmore_txt && $readmore_link ):
        ?>
        <div class="magazine-read-more-wrap">
            <a class="magazine-read-more" href="<?php echo esc_url( $readmore_link ) ?>">
                <?php echo $readmore_txt ?>
            </a>
        </div>
        <?php endif; ?>

    </div>
    <script>
        //emulate "object-fit in IE
        if('objectFit' in document.documentElement.style === false) {
            const img_wrap = document.querySelector( '.magazine-img-wrap' );
            if ( img_wrap ) {
                const img = img_wrap.querySelector( 'img' );
                const src = img.getAttribute( 'src' );
                img_wrap.classList.add( 'emulate-object-fit' );
                img_wrap.setAttribute( 'style', 'background-image: url(' + '"' + src + '");' );
            }
        }
    </script>

</section>

<?php
get_footer();
<?php
/**
 * Comments structure handling.
 *
 * @package     emmaverde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde\Structure;

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\customize_comments_form_defaults' );
/**
 * Modify the comment form default arguments.
 *
 * @since 1.0.0
 *
 * @param array $parameters
 *
 * @return mixed
 */
function customize_comments_form_defaults( array $parameters ) {
	$parameters['title_reply'] = 'laisser un commentaire';
	return $parameters;
}


add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return mixed
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;

	return $args;
}

//* Modify the author says text in comments
add_filter( 'comment_author_says_text', __NAMESPACE__ . '\change_comment_author_text' );
function change_comment_author_text() {
	return ' / ';
}



add_filter( 'comment_form_fields', __NAMESPACE__ . '\move_comment_field' );
/**
 * change the order of the comment fields
 *
 * @since 1.0.0
 *
 * @param $fields
 *
 */
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

//Edit comment form placeholder text
add_filter( 'comment_form_default_fields', __NAMESPACE__ . '\change_comment_placeholders' );

function change_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'nom',
                'comment form placeholder',
                'theme_text_domain'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="email"',
        '<input type="email" placeholder="courriel"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="url"',
        '<input placeholder="site web" id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
}

# RD Pagination - Infinite Scroll for WordPress - Infinit_ajax_loader_for_wordpress

RD Pagination is a WordPress plugin that replaces traditional pagination with an infinite scroll that loads more posts via AJAX. It is designed to be easy to use and customizable, and can be added to any WordPress theme with minimal setup.

## Requirements

- WordPress 4.7 or higher
- jQuery 1.12 or higher

## Installation

1. Download the latest version of RD Pagination from the releases page on GitHub.
2. Extract the plugin folder to your theme's "includes" directory, e.g. `wp-content/themes/my-theme/includes/rd-pagination`.
3. Add the following line to your theme's `functions.php` file:

`include get_template_directory() . '/includes/rd-pagination/rd-pagination.php';`

4. Use the `[rd_pagination]` shortcode on any post, archive, or taxonomy page to display the "Load More" button.

5. Update line 41 - 43 in rd-pagination if you want to alter the post template that is outputted. 
6. Edit line 25 `$('#post-ajax-container').append(response);` to change where it outputs

## Usage

Once you've installed RD Pagination, you can use the `[rd_pagination]` shortcode on any post, archive, or taxonomy page to display the "Load More" button. The shortcode does not take any arguments.

By default, RD Pagination will replace the standard pagination with the "Load More" button. If a user goes to a specific page using the standard pagination (e.g. `/page/2/`), the page will load normally and the "Load More" button will not be displayed.

## Customization

RD Pagination is designed to be easy to customize. You can modify the appearance and behavior of the "Load More" button using CSS and JavaScript.

The "Load More" button is output using the `rd_infinite_scroll()` function in the `rd-pagination.php` file. You can modify this function to change the HTML output of the button.

The behavior of the "Load More" button is controlled by the `rd_load_more_ajax_handler()` function and the `rd-infinite-scroll.js` file. You can modify these files to change how the posts are loaded via AJAX and how the button behaves.

## Support

If you encounter any issues with RD Pagination or have any questions, please open an issue on the [GitHub repository](https://github.com/brettnzl/rd-pagination).

## Credits

RD Pagination was created by Brett Ransley @ (https://revibe.digital/). It is released under the [MIT License](https://opensource.org/licenses/MIT).

## Changelog

### Version 1.0.0

- Initial release.

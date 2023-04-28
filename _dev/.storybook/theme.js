/**
 * 2007-2021 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2021 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
import { create } from '@storybook/theming/create';
import logo from '../src/assets/logo-wordmark.svg';

export default create({
  base: 'light',

  colorPrimary: '#000000',
  colorSecondary: '#000000',
  appBg: '#FFF',
  appBorderRadius: 0,
  fontBase: '"IBM Plex Sans", "Open Sans", Helvetica, Verdana, sans-serif',

  brandTitle: 'PS Social Components',
  brandImage: logo,
});

<?php

/**
 * Theme Normal Page
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header();
?>

    <div class="container rejestrio">
        <div class="row">
                    <table id="basicDataTable" class="rejestrio-table">
                        <tbody>
                            <tr>
                                <th class="col-xs-4"><?php _e('Status', 'your-domain') ?></th>
                                <td class="col-xs-8">

                                    <?php

                                    if (!$_GET['in_liquidation'] && !$_GET['in_bankruptcy'] && !$_GET['in_abeyance'])
                                        echo "aktywna";
                                    else
                                        echo "zawieszona";
                                    ?>

                                </td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Nazwa', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['company_name'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('KRS', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['krs'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('NIP', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['nip'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('REGON', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['regon'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Forma prawna', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['legal_personality'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Adres', 'your-domain') ?></th>
                                <td class="col-xs-8" itemscope="" itemtype="http://data-vocabulary.org/Address">
                                    <span itemprop="street-address"><?php echo $_GET['street'] . ' ' . $_GET['h_number'] ?> </span><br>
                                    <?php echo $_GET['post_code'] ?> <span itemprop="locality"><?php echo $_GET['city'] ?></span><br>
                                    <span itemprop="region"><?php echo $_GET['country'] ?></span><br>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Data rejestracji', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['first_post'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Ostatnia zmiana w KRS', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['last_post'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Typ', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['type'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4">Przewodniczący</th>
                                <td class="col-xs-8"><?php echo $_GET['chairman'] ?></td>
                            </tr>

                            <tr>
                                <th class="col-xs-4"><?php _e('Podstawowa działalność', 'your-domain') ?></th>
                                <td class="col-xs-8"><?php echo $_GET['pkd'] ?></td>
                            </tr>

                        </tbody>
                    </table>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
<?php get_footer(); ?>
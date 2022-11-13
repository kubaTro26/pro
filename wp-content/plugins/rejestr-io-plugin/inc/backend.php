<?php

require_once PLUGIN_INC_DIR . '/functions/validate_NIP.php';
require_once PLUGIN_INC_DIR . '/functions/add_result_page_template.php';
require_once PLUGIN_INC_DIR . '/functions/api_integration.php';


if (isset($_REQUEST['submit_REJESTR_IO_FORM'])) {
    $NIP = $_POST['NIP'];

    if (validatenip($NIP)) {

        $NIP = str_replace(' ', '', $NIP);
        $NIP = str_replace('-', '', $NIP);

        $krs_data = api_integration('c4ab1858-3f68-4f8f-8d97-d4f7aa149a21', $NIP);
        $krs_data = json_decode(json_encode($krs_data), true)['wyniki'][0];

        add_action('template_redirect', function () use ($krs_data) {
            $baseUrl = site_url() . '/wyszukiwanie?post_code=' . $krs_data['adres']['kod'] . '&city=' . $krs_data['adres']['miejscowosc'] . '&street=' . $krs_data['adres']['ulica'] . '&h_number=' . $krs_data['adres']['nr_domu'] . '&chairman=' . $krs_data['glowna_osoba']['imiona_i_nazwisko'] . '&company_name=' . $krs_data['nazwy']['pelna'] . '&short_name=' . $krs_data['nazwy']['skrocona'] . '&krs=' . $krs_data['numery']['krs'] . '&nip=' . $krs_data['numery']['nip'] . '&regon=' . $krs_data['numery']['regon'] . '&legal_personality=' . $krs_data['stan']['forma_prawna'] . '&pkd=' . $krs_data['stan']['pkd_przewazajace_dzial'] . '&first_post=' . $krs_data['krs_wpisy']['pierwszy_data'] . '&last_post=' . $krs_data['krs_wpisy']['najnowszy_data'] . '&country=' . $krs_data['adres']['panstwo'] . '&type=' . $krs_data['typ'] . '&in_liquidation=' . $krs_data['stan']['w_likwidacji'] . '&in_bankruptcy=' . $krs_data['stan']['w_upadlosci'] . '&in_abeyance' . $krs_data['stan']['w_zawieszeniu'];
            wp_redirect($baseUrl, 302);
            exit();
        });
    } else {
        echo "Error: Invalid NIP";
    }
}

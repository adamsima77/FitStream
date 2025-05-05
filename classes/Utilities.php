<?php
declare(strict_types=1);
namespace Utilities;

class Utilities{

    public function spravaCSS(string $nazov_suboru): void{
       
        $priradenie_css = [

        'index' => ['index.css', 'navbar_sidebar.css', 'footer.css', 'slideshow.css','vseobecne_styly.css'],
        'register' => ['register.css','vseobecne_styly.css'],
        'login' => ['login.css','vseobecne_styly.css'],
        'vyziva' => ['navbar_sidebar.css', 'footer.css', 'vyziva.css','vseobecne_styly.css'],
        'produkt' => ['navbar_sidebar.css', 'footer.css', 'produkt_detail.css','vseobecne_styly.css'],
        'prislusenstvo' => ['navbar_sidebar.css', 'footer.css', 'prislusenstvo.css','vseobecne_styly.css'],
        'oblecenie' => ['navbar_sidebar.css', 'footer.css', 'oblecenie.css','vseobecne_styly.css'],
        'kosik' => ['navbar_sidebar.css', 'footer.css', 'objednavky.css','vseobecne_styly.css'],
        'kontakt' => ['kontakt.css', 'navbar_sidebar.css', 'footer.css','akordeon.css','vseobecne_styly.css'],
        'blog' => ['navbar_sidebar.css', 'footer.css', 'blog.css','vseobecne_styly.css'],
        'blog_clanok' => ['navbar_sidebar.css', 'footer.css', 'blog_clanky.css','vseobecne_styly.css'],
        'nastavenia' => ['nastavenia.css', 'navbar_sidebar.css', 'footer.css','vseobecne_styly.css'],
        'uspesna_objednavka' => ['uspesna_objednavka.css','vseobecne_styly.css'],
        'vypis_udajov' => ['navbar_sidebar.css', 'footer.css','vypis_udajov.css','vseobecne_styly.css'],
        'meno_adresa' => ['navbar_sidebar.css', 'footer.css','meno_adresa.css','vseobecne_styly.css']

        ];

        $rozdelenie = explode(".",$nazov_suboru);
        $nazov_bez_pripony = strtolower($rozdelenie[0]);

        if (array_key_exists($nazov_bez_pripony, $priradenie_css)) {
            foreach ($priradenie_css[$nazov_bez_pripony] as $nazov_css) {
                echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'css/' . $nazov_css . '">';
            }
        }
        
        


        }

    public function rozdelenieJavascriptu(string $nazov_suboru): void{

        $priradenie_javascript = [

            'index' => ['hamburger.js','slideshow.js'],
            'vyziva' => ['hamburger.js'],
            'produkt' => ['hamburger.js'],
            'prislusenstvo' => ['hamburger.js'],
            'oblecenie' => ['hamburger.js'],
            'kosik' => ['hamburger.js'],
            'kontakt' => ['hamburger.js', 'akordeon.js'],
            'blog' => ['hamburger.js'],
            'blog_clanok' => ['hamburger.js'],
            'nastavenia' => ['hamburger.js','overenieVymazanie.js'],
            'uspesna_objednavka' => ['hamburger.js'],
            'vypis_udajov' => ['hamburger.js'],
            'meno_adresa' => ['hamburger.js']
    
            ];

            $rozdelenie = explode(".",$nazov_suboru);
            $nazov_bez_pripony = strtolower($rozdelenie[0]);
    
            if (array_key_exists($nazov_bez_pripony, $priradenie_javascript)) {
                foreach ($priradenie_javascript[$nazov_bez_pripony] as $nazov_js) {
                    echo '<script src="' . BASE_URL . 'javascript/' . $nazov_js . '" type="text/javascript"></script>';
                }
            }
    }


}
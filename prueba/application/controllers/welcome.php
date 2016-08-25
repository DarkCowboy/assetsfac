<?php

class Welcome extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['menu'] = 'inicio';
        $this->load->view("principal", $this->data);
    }

    function get_url_contents($update = '') {
        header('Content-Type: text/html; charset=UTF-8');
        $url = array();
//        $url[] = 'http://www.capital.com.pa/feed/';
        $url[] = 'http://www.anpanama.com/LastNewsRss.aspx';
        $result = array();
        foreach ($url as $feed) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $feed);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result[] = curl_exec($ch);
        }
        $rss[0] = @simplexml_load_string($result[0]);

        if ($result) {
            foreach ($rss as $xml) {
                if (!is_bool($xml)) {
                    $elements = $xml->children;
                    $this->data['code_result'] = 1;
                    if ($xml->entry) {
                        foreach ($xml->entry as $noticia) {
                            $noticias[] = array('titulo' => (string) $noticia->title,
                                'link' => (string) $noticia->id,
                                'description' => (string) $noticia->content->attributes->div);
                        }
                    } else {
                        foreach ($xml->channel->item as $noticia) {
                            $noticias[] = array('titulo' => (string) $noticia->title,
                                'link' => (string) $noticia->link,
                                'description' => (string) $noticia->description);
                        }
                    }

                    $this->data['noticias'] = $noticias;
                }
            }
            if ($noticias) {
                if ($update == 'update') {
                    $i = 1;
                    foreach ($noticias as $row) {
                        $row['titulo'] = $this->replaceAccents($row['titulo']);
                        echo '<li id="item' . $i . '">';
                        echo '<a target="_blank" href="' . $row['link'] . '" >' . $row['titulo'] . '</a>';
                        echo '</li>';
                        $i = $i + 1;
                    }
                } else {
                    echo '<ul id="webticker">';
                    $i = 1;
                    foreach ($noticias as $row) {
                        $row['titulo'] = $this->replaceAccents($row['titulo']);
                        echo '<li id="item' . $i . '">';
                        echo '<a target="_blank" href="' . $row['link'] . '" >' . $row['titulo'] . '</a>';
                        echo '</li>';
                        $i = $i + 1;
                    }
                    echo '</ul>';
                }
            }
        }
    }

    public function replaceAccents($newphrase) {

        $newphrase = str_replace("Ãœ", "U", $newphrase);
        $newphrase = str_replace("Å�?", "S", $newphrase);
        $newphrase = str_replace("Ä�?", "G", $newphrase);
        $newphrase = str_replace("Ã‡", "C", $newphrase);
        $newphrase = str_replace("Ä°", "I", $newphrase);
        $newphrase = str_replace("Ã–", "O", $newphrase);
        $newphrase = str_replace("Ã¼", "u", $newphrase);
        $newphrase = str_replace("ÅŸ", "s", $newphrase);
        $newphrase = str_replace("Ã§", "c", $newphrase);
        $newphrase = str_replace("Ä±", "i", $newphrase);
        $newphrase = str_replace("Ã¶", "o", $newphrase);
        $newphrase = str_replace("ÄŸ", "g", $newphrase);

        $newphrase = str_replace("Ü", "U", $newphrase);
        $newphrase = str_replace("�?", "S", $newphrase);
        $newphrase = str_replace("�?", "G", $newphrase);
        $newphrase = str_replace("Ç", "C", $newphrase);
        $newphrase = str_replace("İ", "I", $newphrase);
        $newphrase = str_replace("Ö", "O", $newphrase);
        $newphrase = str_replace("ü", "u", $newphrase);
        $newphrase = str_replace("ş", "s", $newphrase);
        $newphrase = str_replace("ç", "c", $newphrase);
        $newphrase = str_replace("ı", "i", $newphrase);
        $newphrase = str_replace("ö", "o", $newphrase);
        $newphrase = str_replace("ğ", "g", $newphrase);


        $newphrase = str_replace("�", "U", $newphrase);
        $newphrase = str_replace("?", "G", $newphrase);
        $newphrase = str_replace("?", "S", $newphrase);
        $newphrase = str_replace("?", "I", $newphrase);
        $newphrase = str_replace("�", "O", $newphrase);
        $newphrase = str_replace("�", "C", $newphrase);
        $newphrase = str_replace("�", "u", $newphrase);
        $newphrase = str_replace("?", "g", $newphrase);
        $newphrase = str_replace("?", "s", $newphrase);
        $newphrase = str_replace("?", "i", $newphrase);
        $newphrase = str_replace("�", "o", $newphrase);
        $newphrase = str_replace("�", "c", $newphrase);


        $newphrase = str_replace("�", "U", $newphrase);
        $newphrase = str_replace("?", "G", $newphrase);
        $newphrase = str_replace("?", "S", $newphrase);
        $newphrase = str_replace("?", "I", $newphrase);
        $newphrase = str_replace("�", "O", $newphrase);
        $newphrase = str_replace("�", "C", $newphrase);
        $newphrase = str_replace("�", "u", $newphrase);
        $newphrase = str_replace("?", "g", $newphrase);
        $newphrase = str_replace("?", "s", $newphrase);
        $newphrase = str_replace("?", "i", $newphrase);
        $newphrase = str_replace("�", "o", $newphrase);
        $newphrase = str_replace("�", "c", $newphrase);

        $newphrase = str_replace("%u015F", "s", $newphrase);
        $newphrase = str_replace("%E7", "c", $newphrase);
        $newphrase = str_replace("%FC", "u", $newphrase);
        $newphrase = str_replace("%u0131", "i", $newphrase);
        $newphrase = str_replace("%F6", "o", $newphrase);
        $newphrase = str_replace("%u015E", "S", $newphrase);
        $newphrase = str_replace("%C7", "C", $newphrase);
        $newphrase = str_replace("%DC", "U", $newphrase);
        $newphrase = str_replace("%D6", "O", $newphrase);
        $newphrase = str_replace("%u0130", "I", $newphrase);
        $newphrase = str_replace("%u011F", "g", $newphrase);
        $newphrase = str_replace("%u011E", "G", $newphrase);

        $newphrase = str_replace("�", "E", $newphrase);
        $newphrase = str_replace("�", "e", $newphrase);
        $newphrase = str_replace("�", "e", $newphrase);
        $newphrase = str_replace("�", "x", $newphrase);


        $newphrase = utf8_decode($newphrase);
    

        return $newphrase;
    }

}

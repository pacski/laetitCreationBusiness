<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:wordsCloud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $date = rand(1,1000);
        $nom_file = "App/Console/wordsCloud-$date.txt";
        $texte = "Hé toi
        Qu'est-ce que tu regardes?
        T'as jamais vu une femme qui se bat
        Suis-moi
        Dans la ville blafarde
                
        Et je te montrerai
        Comme je mords, comme j'aboie
        
        Prends garde, sous mon sein la grenade
        Sous mon sein là regarde
        Sous mon sein la grenade
        Prends garde, sous mon sein la grenade
        Sous mon sein là regarde
        Sous mon sein la grenade
        
        Hé toi
        Mais qu'est-ce que tu crois?
        Je ne suis qu'un animal
        Déguisé en madone
        Hé toi
        Je pourrais te faire mal
        Je pourrais te blesser, oui
        Dans la nuit qui frissonne";
        
        $texte = strtolower($texte);
        $texte = str_replace("'"," ",$texte);
        $texte = str_replace(".","", $texte);
        $texte = str_replace(",","", $texte);

        function AuStripSlashes($texte) {
            return(get_magic_quotes_gpc() == 1 ? StripSlashes($texte) : $texte);
        }

        $texte = AuStripSlashes($texte);
        
        function TexteSansAccent($texte){
        $accent='ÀÁÂàÄÅàáâàäåÒÓÔÕÖØòóôõöøÈÉÊËéèêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ';
        $noaccent='AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn'; 
        $texte = strtr($texte,$accent,$noaccent); 
        return $texte; 
        }

        $texte = TexteSansAccent($texte);

        $textNew = "";
        
        $tab_banni = ["mais","ou","et","donc","or","ni","car",
        "je","il","lui","ils","elle","elles","nous","vous",
        "vos","votre","mes","mien","mien","tien","tiens",
        "tout","toute","toutes",
        "a","b","c","d","e","f","g","h","i","j","l","m","n","o","p","q",
        "r","s","t","u","v","w","x","y","z",
        "le","la","les","nos",
        "alors","au","aucuns","aussi","autre","avant","avec","avoir","bon","car","ce",
        "cela","ces","ceux","chaque","ci","comme","comment","dans","des","du","dedans",
        "dehors","depuis","deux","devrait","doit","donc","dos","droite","début","elle",
        "elles","en","encore","essai","est","et","eu","fait","faites","fois","font",
        "force","haut","hors","ici","il","ils","je juste","la","le","les","leur","là",
        "ma","maintenant","mais","mes","mine","moins","mon","mot","même","ni","nommés",
        "notre","nous","nouveaux","ou","où","par","parce","parole","pas","personnes",
        "peut","peu","pièce","plupart","pour","pourquoi","quand","que","quel","quelle",
        "quelles","quels","qui","sa","sans","ses","seulement","si","sien","son",
        "sont","sous","soyez sujet","sur","ta","tandis","tellement","tels","tes","ton",
        "tous","tout","trop","très","tu","valeur","voie","voient","vont","votre","vous",
        "vu","ça","étaient","état","étions","été","être",
        "un","deux","trois","quatre","cinq","six","sept","huit","neuf","dix",
        "0","1","2","3","4","5","6","7","8","9","10",
        "avec","chez","par","dans","des","en","de","une","votre","meilleurs","entre",
        "entres","depuis","alors","ne","pas","du","meme",
        "ou","nom","seuls","acceptes","ayant",
        "vos","votre","mes","mien","mien","tien","tiens","tout","toute","toutes",
        "que","quoi","qui","comment","peu","peut","pis","puis","pas",
        "chaque","chacun","chacune",
        "son","ses","au","aux","se","sur","ce","ceux","cette","ca","ci","ceci","cela",
        "aussi","pour","petit","grand","moyen","large","haut","bas","milieu","droite",
        "gauche","centre","dit","etre","leur","leurs","plus","moin","moins",
        "es","est","sont","son","va","suis","ai","viens"];
        
        $texte = explode(" ",$texte);

        $regs = array_diff($texte,$tab_banni);
        $stats = array_count_values($regs);
        array_multisort($stats, SORT_DESC);
        $tabKey = array_keys($stats);
        
        for ($i=0; $i < count($tabKey) ; $i++) 
        { 
            $textNew = $textNew . ' '. $tabKey[$i];
        }
                 
        // création du fichier
        $f = fopen($nom_file, "x+");
        // écriture
            fputs($f, $textNew );
        // fermeture
            fclose($f);
    }
}

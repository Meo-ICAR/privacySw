<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionnaireSection;
use App\Models\QuestionnaireItem;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =========================================================
        // INSERIMENTO SEZIONI (PADRE)
        // =========================================================
        $sections = [
            [
                'id' => 1,
                'code' => 'A',
                'title' => 'INFORMAZIONI GENERALI',
                'description' => null,
                'is_repeatable' => false,
                'sort_order' => 10,
            ],
            [
                'id' => 2,
                'code' => 'B',
                'title' => 'SUBAPPALTATORI',
                'description' => 'Compilare una scheda per ogni subappaltatore utilizzato (inclusi Extra-UE).',
                'is_repeatable' => true,
                'sort_order' => 20,
            ],
            [
                'id' => 3,
                'code' => 'C',
                'title' => 'LISTE CONTATTI',
                'description' => 'Gestione delle liste, Door to Door e Opposizioni.',
                'is_repeatable' => false,
                'sort_order' => 30,
            ],
            [
                'id' => 4,
                'code' => 'D',
                'title' => 'CHIAMATE TELEFONICHE',
                'description' => 'LE COSIDDETTE "TELEFONATE MUTE" SONO CHIAMATE EFFETTUATE DA CALL CENTER PER FINALITÀ COMMERCIALI, EFFETTUATE ATTRAVERSO SISTEMI AUTOMATIZZATI CHE GENERANO PIÙ CHIAMATE RISPETTO AL NUMERO DEGLI OPERATORI DISPONIBILI A GESTIRLE.',
                'is_repeatable' => false,
                'sort_order' => 40,
            ],
        ];

        foreach ($sections as $sectionData) {
            QuestionnaireSection::updateOrCreate(
                ['id' => $sectionData['id']],
                $sectionData
            );
        }

        // =========================================================
        // INSERIMENTO VOCI DI DETTAGLIO (ITEMS)
        // =========================================================

        // SEZIONE A: INFORMAZIONI GENERALI
        $itemsA = [
            ['question_text' => 'Estremi Iscrizione ROC', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 10],
            ['question_text' => 'Numerazioni Telefoniche di Chiamata', 'help_text' => 'Si prega di fornire anche eventuali numerazioni di back up, anche qualora non utilizzate specificamente per l’esecuzione del contratto', 'input_type' => 'textarea', 'sort_order' => 20],
            ['question_text' => 'Estremi eventuale iscrizione a Fondazione Bordoni – FUB', 'help_text' => 'Si prega di indicare la data di iscrizione', 'input_type' => 'date', 'sort_order' => 30],
            ['question_text' => 'Sedi operative diverse dalla sede legale', 'help_text' => null, 'input_type' => 'textarea', 'sort_order' => 40],
        ];

        foreach ($itemsA as $item) {
            QuestionnaireItem::updateOrCreate(
                ['section_id' => 1, 'question_text' => $item['question_text']],
                $item
            );
        }

        // SEZIONE B: SUBAPPALTATORI (Ripetibile)
        $itemsB = [
            ['question_text' => 'Nome Subappaltatore', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 10],
            ['question_text' => 'Paese', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 20],
            ['question_text' => 'Ragione Sociale', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 30],
            ['question_text' => 'Sede Legale', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 40],
            ['question_text' => 'Sedi operative dove viene svolta l’attività (Unione Europea)', 'help_text' => 'Elencare tutte le sedi, indirizzo completo, nazione', 'input_type' => 'textarea', 'sort_order' => 50],
            ['question_text' => 'Legale Rappresentante', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 60],
            ['question_text' => 'Referente Attività', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 70],
            ['question_text' => 'Descrizione attività subappaltate', 'help_text' => null, 'input_type' => 'textarea', 'sort_order' => 80],
            ['question_text' => 'Estremi iscrizione al ROC', 'help_text' => null, 'input_type' => 'text', 'sort_order' => 90],
            ['question_text' => 'Numerazioni telefoniche di chiamata', 'help_text' => 'Incluse eventuali numerazioni di back up', 'input_type' => 'textarea', 'sort_order' => 100],
            ['question_text' => 'Estremi eventuale iscrizione a Fondazione Bordoni (FUB)', 'help_text' => null, 'input_type' => 'date', 'sort_order' => 110],
            ['question_text' => 'Nominativo completo di ciascuna struttura (Extra UE)', 'help_text' => 'Solo per subappaltatori Extra UE: indicare se sede secondaria, società del gruppo, altro', 'input_type' => 'text', 'sort_order' => 120],
            ['question_text' => 'Tutte le sedi di servizio dove viene svolta l’attività (Extra UE)', 'help_text' => 'Solo per subappaltatori Extra UE', 'input_type' => 'textarea', 'sort_order' => 130],
            ['question_text' => 'Descrizione attività subappaltate (Extra UE)', 'help_text' => 'Solo per subappaltatori Extra UE', 'input_type' => 'textarea', 'sort_order' => 140],
            ['question_text' => 'Altre informazioni utili', 'help_text' => 'Es. comunicazioni ministero del lavoro per attività di call center, altro', 'input_type' => 'textarea', 'sort_order' => 150],
        ];

        foreach ($itemsB as $item) {
            QuestionnaireItem::updateOrCreate(
                ['section_id' => 2, 'question_text' => $item['question_text']],
                $item
            );
        }

        // SEZIONE C: LISTE CONTATTI
        $itemsC = [
            // Sottosezione 1: Fonte e Tipologia
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Specificare la/le tipologie di Liste/Data Base utilizzate', 'help_text' => 'Opzioni: Liste Data Base Unico, Numerazioni raccolte autonomamente, Liste acquisite da terze parti in favore di Vodafone, Liste fornite da Vodafone', 'input_type' => 'textarea', 'sort_order' => 10],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Per ogni tipologia di lista utilizzata specificare quali dati personali sono contenuti', 'help_text' => 'Nome/cognome, numero di telefono/mail ecc..', 'input_type' => 'textarea', 'sort_order' => 20],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso delle LISTE DATA BASE UNICO, vengono sottoposte al FUB ogni 15gg?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 30],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso di NUMERAZIONI RACCOLTE AUTONOMAMENTE, specificare la fonte del dato', 'help_text' => 'Es. concorso, form di ricontatto sito web, form cartaceo, ecc.', 'input_type' => 'textarea', 'sort_order' => 40],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso di NUMERAZIONI RACCOLTE AUTONOMAMENTE quali tipologie di consenso vengono raccolte?', 'help_text' => 'Es. consenso commerciale terzi, comunicazione dati a terzi', 'input_type' => 'textarea', 'sort_order' => 50],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso di NUMERAZIONI RACCOLTE AUTONOMAMENTE, si dispone di controlli su informativa privacy e consensi?', 'help_text' => 'Modalità ed evidenza della raccolta, revoca, ecc.', 'input_type' => 'boolean', 'sort_order' => 60],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Vengono utilizzate anche numerazioni “FUORI LISTA”?', 'help_text' => 'Contatti verso numerazioni non presenti nelle liste, ottenute in autonomia/da Vodafone', 'input_type' => 'boolean', 'sort_order' => 70],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Sono previste delle linee guida per la corretta gestione dei “FUORI LISTA”?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 80],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso NON vengano utilizzate numerazioni “FUORI LISTA” indicare le modalità tecniche per impedirne il trattamento', 'help_text' => 'Es. tastierino IVR bloccato / non utilizzabile', 'input_type' => 'textarea', 'sort_order' => 90],
            ['subsection_label' => '1 – FONTE E TIPOLOGIA DELLE LISTE', 'question_text' => 'Nel caso di NUMERAZIONI RACCOLTE DA SOGGETTI TERZI in favore di VODAFONE, si dispone di controlli?', 'help_text' => 'Su informativa privacy, raccolta consenso, revoca, ecc.', 'input_type' => 'boolean', 'sort_order' => 100],

            // Sottosezione 2: Door to Door
            ['subsection_label' => '2 – DOOR TO DOOR E PRESA APPUNTAMENTO', 'question_text' => 'Viene svolta una attività di tipo Door to Door?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 110],
            ['subsection_label' => '2 – DOOR TO DOOR E PRESA APPUNTAMENTO', 'question_text' => 'In caso affermativo, è prevista attività preliminare di presa appuntamento?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 120],
            ['subsection_label' => '2 – DOOR TO DOOR E PRESA APPUNTAMENTO', 'question_text' => 'In che modo vengono raccolte le anagrafiche da contattare? Specificare la fonte', 'help_text' => 'Es. concorso, form sito web, cartaceo', 'input_type' => 'textarea', 'sort_order' => 130],
            ['subsection_label' => '2 – DOOR TO DOOR E PRESA APPUNTAMENTO', 'question_text' => 'Viene fornita idonea informativa all’interessato per raccogliere il consenso?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 140],
            ['subsection_label' => '2 – DOOR TO DOOR E PRESA APPUNTAMENTO', 'question_text' => 'Specificare quale tipologia di consenso viene raccolto', 'help_text' => 'Es. consenso commerciale terzi, comunicazione a terzi', 'input_type' => 'textarea', 'sort_order' => 150],

            // Sottosezione 3: Opposizioni e Revoche
            ['subsection_label' => '3 - GESTIONE OPPOSIZIONI E REVOCHE', 'question_text' => 'Indicare il processo seguito per registrare a sistema l’opposizione/revoca del consenso', 'help_text' => 'Considerare sia Teleselling che Door to Door (doppia risposta se necessaria)', 'input_type' => 'textarea', 'sort_order' => 160],
            ['subsection_label' => '3 - GESTIONE OPPOSIZIONI E REVOCHE', 'question_text' => 'Indicare che si è in grado di fornire a Vodafone su base oraria i cartellini di traffico con relativi esiti', 'help_text' => 'Inclusa la richiesta di opposizione', 'input_type' => 'boolean', 'sort_order' => 170],
            ['subsection_label' => '3 - GESTIONE OPPOSIZIONI E REVOCHE', 'question_text' => 'Indicare le modalità di tracciamento a sistema dell’opposizione/revoca del consenso', 'help_text' => null, 'input_type' => 'textarea', 'sort_order' => 180],
            ['subsection_label' => '3 - GESTIONE OPPOSIZIONI E REVOCHE', 'question_text' => 'Indicare le modalità/tecniche che impediscono il ricontatto del soggetto che ha esercitato l’opposizione', 'help_text' => 'Es. blacklist interna, configurazione IVR', 'input_type' => 'textarea', 'sort_order' => 190],
        ];

        foreach ($itemsC as $item) {
            QuestionnaireItem::updateOrCreate(
                ['section_id' => 3, 'question_text' => $item['question_text']],
                $item
            );
        }

        // SEZIONE D: CHIAMATE TELEFONICHE
        $itemsD = [
            ['subsection_label' => '1 – MISURE IDONEE (CHIAMATE MUTE)', 'question_text' => 'Le chiamate andate a buon fine vengono suddivise in Classe A e Classe B?', 'help_text' => 'CLASSE A: mute (interrotte entro 3 sec); CLASSE B: restanti tipologie buone.', 'input_type' => 'boolean', 'sort_order' => 10],
            ['subsection_label' => '1 – MISURE IDONEE (CHIAMATE MUTE)', 'question_text' => 'La percentuale di chiamate "Mute" viene mantenuta entro le soglie (3% campagna / 4% giornaliero)?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 20],
            ['subsection_label' => '1 – MISURE IDONEE (CHIAMATE MUTE)', 'question_text' => 'Il sistema trasmette una traccia audio (Comfort Noise) per evitare l\'attesa silenziosa?', 'help_text' => 'Rumori ambientali, voci di sottofondo, squilli', 'input_type' => 'boolean', 'sort_order' => 30],
            ['subsection_label' => '1 – MISURE IDONEE (CHIAMATE MUTE)', 'question_text' => 'Vengono rispettate le regole di ricontattabilità (Divieto 5 giorni per mute + ricontatto con operatore)?', 'help_text' => null, 'input_type' => 'boolean', 'sort_order' => 40],
        ];

        foreach ($itemsD as $item) {
            QuestionnaireItem::updateOrCreate(
                ['section_id' => 4, 'question_text' => $item['question_text']],
                $item
            );
        }
    }
}

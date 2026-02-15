<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CsaStarDomain;
use App\Models\CsaStarQuestion;
use Illuminate\Support\Facades\DB;

class CsaStarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks for clean seeding if necessary
        // However, we'll do it cleanly by truncating in order
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CsaStarQuestion::truncate();
        CsaStarDomain::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $domains = [
            ['id' => 1, 'code' => 'A&A', 'name' => 'Audit & Assurance (Audit e Garanzia)', 'sort_order' => 10],
            ['id' => 2, 'code' => 'AIS', 'name' => 'Application & Interface Security (Sicurezza Applicativa)', 'sort_order' => 20],
            ['id' => 3, 'code' => 'BCR', 'name' => 'Business Continuity & Op. Resilience (Continuità Operativa)', 'sort_order' => 30],
            ['id' => 4, 'code' => 'CCC', 'name' => 'Change Control & Configuration (Gestione Modifiche)', 'sort_order' => 40],
            ['id' => 5, 'code' => 'CEK', 'name' => 'Cryptography, Encryption & Key Mgmt (Crittografia)', 'sort_order' => 50],
            ['id' => 6, 'code' => 'DCS', 'name' => 'Datacenter Security (Sicurezza Fisica Datacenter)', 'sort_order' => 60],
            ['id' => 7, 'code' => 'DSI', 'name' => 'Data Security & Info Lifecycle (Sicurezza Dati)', 'sort_order' => 70],
            ['id' => 8, 'code' => 'DSP', 'name' => 'Data Governance & Privacy (Privacy dei Dati)', 'sort_order' => 80],
            ['id' => 9, 'code' => 'HRS', 'name' => 'Human Resources (Risorse Umane)', 'sort_order' => 90],
            ['id' => 10, 'code' => 'IAM', 'name' => 'Identity & Access Management (Gestione Identità)', 'sort_order' => 100],
            ['id' => 11, 'code' => 'IVS', 'name' => 'Infrastructure & Virtualization (Infrastruttura)', 'sort_order' => 110],
            ['id' => 12, 'code' => 'IPY', 'name' => 'Interoperability & Portability (Interoperabilità)', 'sort_order' => 120],
            ['id' => 13, 'code' => 'MOS', 'name' => 'Mobile Security (Sicurezza Mobile)', 'sort_order' => 130],
            ['id' => 14, 'code' => 'SEF', 'name' => 'Security Incident Mgmt (Gestione Incidenti)', 'sort_order' => 140],
            ['id' => 15, 'code' => 'STA', 'name' => 'Supply Chain (Catena di Fornitura)', 'sort_order' => 150],
            ['id' => 16, 'code' => 'TVM', 'name' => 'Threat & Vulnerability Mgmt (Vulnerabilità)', 'sort_order' => 160],
            ['id' => 17, 'code' => 'UEM', 'name' => 'Universal Endpoint Management (Endpoint)', 'sort_order' => 170],
        ];

        foreach ($domains as $domain) {
            CsaStarDomain::create($domain);
        }

        $questions = [
            // === DOMINIO 1: A&A (Audit) ===
            [1, 'A&A-01', 'A&A-01.1', 'Esistono politiche e procedure approvate dalla direzione per condurre audit e revisioni periodiche del sistema informativo?'],
            [1, 'A&A-02', 'A&A-02.1', 'Vengono effettuati audit indipendenti (interni o esterni) almeno annualmente per verificare la conformità agli standard di sicurezza?'],
            [1, 'A&A-03', 'A&A-03.1', 'I risultati degli audit vengono comunicati alla direzione e le non conformità vengono tracciate fino alla risoluzione?'],

            // === DOMINIO 2: AIS (Sicurezza Applicativa) ===
            [2, 'AIS-01', 'AIS-01.1', 'Avete definito un ciclo di vita dello sviluppo del software (SDLC) che includa controlli di sicurezza in tutte le fasi?'],
            [2, 'AIS-02', 'AIS-02.1', 'Vengono eseguiti test di sicurezza delle applicazioni (SAST/DAST) prima del rilascio in produzione?'],
            [2, 'AIS-03', 'AIS-03.1', 'Esiste una procedura per gestire e correggere le vulnerabilità critiche del software entro tempi prestabiliti (SLA)?'],
            [2, 'AIS-04', 'AIS-04.1', 'Sviluppate il software seguendo pratiche di secure coding (es. OWASP Top 10)?'],
            [2, 'AIS-06', 'AIS-06.1', 'I dati di test sono anonimizzati o sintetici? È vietato usare dati reali di produzione negli ambienti di test?'],
            [2, 'AIS-07', 'AIS-07.1', 'L\'architettura delle applicazioni e delle API è documentata e rivista periodicamente?'],

            // === DOMINIO 3: BCR (Business Continuity) ===
            [3, 'BCR-01', 'BCR-01.1', 'Esiste un piano di Business Continuity (BCP) e Disaster Recovery (DR) documentato e approvato?'],
            [3, 'BCR-02', 'BCR-02.1', 'Il piano di Disaster Recovery viene testato almeno annualmente?'],
            [3, 'BCR-06', 'BCR-06.1', 'I backup dei dati critici vengono eseguiti regolarmente e testati per garantire l\'integrità del ripristino?'],
            [3, 'BCR-08', 'BCR-08.1', 'I backup sono protetti da accessi non autorizzati e, ove applicabile, crittografati?'],

            // === DOMINIO 4: CCC (Change Management) ===
            [4, 'CCC-01', 'CCC-01.1', 'Esiste una politica formale di gestione delle modifiche (Change Management) per l\'infrastruttura e le applicazioni?'],
            [4, 'CCC-02', 'CCC-02.1', 'Tutte le modifiche in produzione richiedono approvazione formale e test preventivi (Rollback plan)?'],
            [4, 'CCC-04', 'CCC-04.1', 'Esiste un processo per gestire le modifiche di emergenza (Emergency Changes)?'],

            // === DOMINIO 5: CEK (Crittografia) ===
            [5, 'CEK-01', 'CEK-01.1', 'Utilizzate algoritmi di crittografia standard e approvati (es. AES-256) evitando algoritmi obsoleti?'],
            [5, 'CEK-03', 'CEK-03.1', 'Esiste una procedura per la gestione del ciclo di vita delle chiavi crittografiche (generazione, rotazione, revoca)?'],
            [5, 'CEK-04', 'CEK-04.1', 'Le chiavi crittografiche sono gestite separatamente dai dati che proteggono?'],

            // === DOMINIO 6: DCS (Datacenter) ===
            [6, 'DCS-01', 'DCS-01.1', 'Gli accessi fisici ai datacenter sono controllati tramite badge, biometria e videosorveglianza?'],
            [6, 'DCS-02', 'DCS-02.1', 'Esiste un registro degli accessi fisici mantenuto per almeno 90 giorni?'],
            [6, 'DCS-09', 'DCS-09.1', 'I beni fisici (server, dischi) vengono bonificati o distrutti in modo sicuro prima dello smaltimento?'],

            // === DOMINIO 7: DSI (Sicurezza Dati) ===
            [7, 'DSI-01', 'DSI-01.1', 'Avete implementato uno schema di classificazione dei dati (es. Pubblico, Interno, Confidenziale)?'],
            [7, 'DSI-02', 'DSI-02.1', 'I dati sensibili sono crittografati quando archiviati (Data at Rest)?'],
            [7, 'DSI-03', 'DSI-03.1', 'I dati sensibili sono crittografati durante il transito (Data in Transit) su reti pubbliche e interne (es. TLS 1.2+)?'],
            [7, 'DSI-07', 'DSI-07.1', 'Esistono meccanismi per la cancellazione sicura dei dati dei clienti alla fine del contratto?'],

            // === DOMINIO 8: DSP (Privacy) ===
            [8, 'DSP-01', 'DSP-01.1', 'Esiste una politica della privacy conforme al GDPR e alle normative locali?'],
            [8, 'DSP-04', 'DSP-04.1', 'Ottenete il consenso esplicito per la raccolta e il trattamento dei dati personali quando richiesto?'],
            [8, 'DSP-08', 'DSP-08.1', 'Sono definite le procedure per gestire le richieste degli interessati (es. diritto all\'oblio, accesso)?'],

            // === DOMINIO 9: HRS (Risorse Umane) ===
            [9, 'HRS-01', 'HRS-01.1', 'Vengono effettuati controlli sui precedenti (background checks) dei dipendenti prima dell\'assunzione, ove consentito dalla legge?'],
            [9, 'HRS-02', 'HRS-02.1', 'I dipendenti firmano accordi di riservatezza (NDA) al momento dell\'assunzione?'],
            [9, 'HRS-09', 'HRS-09.1', 'Tutti i dipendenti completano regolarmente corsi di formazione sulla sicurezza e privacy?'],

            // === DOMINIO 10: IAM (Identity & Access) ===
            [10, 'IAM-01', 'IAM-01.1', 'Esiste una politica per la gestione delle identità e degli accessi basata sul principio del privilegio minimo (Least Privilege)?'],
            [10, 'IAM-02', 'IAM-02.1', 'Vengono effettuate revisioni periodiche (es. trimestrali) degli accessi utenti per verificare che siano ancora necessari?'],
            [10, 'IAM-03', 'IAM-03.1', 'È obbligatoria l\'Autenticazione a Più Fattori (MFA) per tutti gli accessi amministrativi e remoti?'],
            [10, 'IAM-04', 'IAM-04.1', 'Esiste una politica per la complessità e la rotazione delle password?'],
            [10, 'IAM-12', 'IAM-12.1', 'L\'accesso ai sistemi viene revocato tempestivamente (es. entro 24 ore) in caso di cessazione del dipendente?'],

            // === DOMINIO 11: IVS (Infrastruttura) ===
            [11, 'IVS-01', 'IVS-01.1', 'I sistemi operativi e i software vengono sottoposti a hardening (configurazione sicura) basato su standard (es. CIS Benchmarks)?'],
            [11, 'IVS-03', 'IVS-03.1', 'Esiste una segmentazione della rete per separare gli ambienti (es. Sviluppo, Test, Produzione)?'],
            [11, 'IVS-08', 'IVS-08.1', 'Utilizzate sistemi di monitoraggio dell\'integrità dei file (FIM) sui server critici?'],

            // === DOMINIO 12: IPY (Interoperabilità) ===
            [12, 'IPY-01', 'IPY-01.1', 'Utilizzate protocolli e formati dati standard (API aperte) per garantire l\'interoperabilità?'],
            [12, 'IPY-02', 'IPY-02.1', 'I clienti possono recuperare i propri dati in un formato standard alla fine del servizio?'],

            // === DOMINIO 13: MOS (Mobile) ===
            [13, 'MOS-01', 'MOS-01.1', 'Esiste una politica per l\'uso dei dispositivi mobili (BYOD o aziendali) che accedono ai dati aziendali?'],
            [13, 'MOS-03', 'MOS-03.1', 'I dispositivi mobili sono protetti da crittografia e blocco schermo con codice/biometria?'],

            // === DOMINIO 14: SEF (Incident Management) ===
            [14, 'SEF-01', 'SEF-01.1', 'Esiste una procedura documentata per la gestione e risposta agli incidenti di sicurezza?'],
            [14, 'SEF-02', 'SEF-02.1', 'Sono definiti i canali di comunicazione e i contatti da notificare in caso di incidente (inclusi clienti e autorità)?'],
            [14, 'SEF-05', 'SEF-05.1', 'Gli incidenti vengono analizzati post-evento (Post-Mortem) per identificarne le cause e prevenire ricorrenze?'],

            // === DOMINIO 15: STA (Supply Chain) ===
            [15, 'STA-01', 'STA-01.1', 'Valutate la sicurezza dei fornitori terzi prima di stipulare contratti?'],
            [15, 'STA-02', 'STA-02.1', 'Esiste un elenco aggiornato di tutti i fornitori terzi e dei servizi che erogano?'],
            [15, 'STA-05', 'STA-05.1', 'I contratti con i fornitori includono clausole specifiche sulla sicurezza e SLA di servizio?'],

            // === DOMINIO 16: TVM (Threat & Vulnerability) ===
            [16, 'TVM-01', 'TVM-01.1', 'Vengono eseguiti Vulnerability Assessment (VA) regolari sull\'infrastruttura esterna ed interna?'],
            [16, 'TVM-02', 'TVM-02.1', 'Vengono eseguiti Penetration Test da terze parti almeno annualmente?'],
            [16, 'TVM-03', 'TVM-03.1', 'Utilizzate soluzioni anti-malware aggiornate su tutti gli endpoint e server supportati?'],

            // === DOMINIO 17: UEM (Endpoint) ===
            [17, 'UEM-01', 'UEM-01.1', 'Esiste un inventario aggiornato di tutti i dispositivi endpoint autorizzati ad accedere alla rete?'],
            [17, 'UEM-04', 'UEM-04.1', 'Gli endpoint vengono bloccati o cancellati da remoto in caso di smarrimento o furto?'],
        ];

        foreach ($questions as $q) {
            CsaStarQuestion::create([
                'domain_id' => $q[0],
                'control_id' => $q[1],
                'question_id' => $q[2],
                'question_text' => $q[3],
            ]);
        }
    }
}

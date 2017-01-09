<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RocketfireAgenceMainBundle\Entity\Ville;

/**
 * Description of LoadLoginClass
 *
 * @author Seme
 */
class LoadVilleClass implements FixtureInterface
{

    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->generateEntities();

        $this->manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }

    private function generateEntities()
    {
        $vars = array('OZAN',
            'CORMORANCHE-SUR-SAONE',
            'PLAGNE',
            'TOSSIAT',
            'POUILLAT',
            'TORCIEU',
            'REPLONGES',
            'CORCELLES',
            'PERON',
            'RELEVANT',
            'CHAVEYRIAT',
            'VAUX-EN-BUGEY',
            'MAILLAT',
            'FARAMANS',
            'BEON',
            'SAINT-BERNARD',
            'ROSSILLON',
            "PONT-D'AIN",
            'NANTUA',
            'CHAVANNES-SUR-REYSSOUZE',
            'NEUVILLE-LES-DAMES',
            'FLAXIEU',
            'HOTONNES',
            'SAINT-SORLIN-EN-BUGEY',
            'SONGIEU',
            'VIRIEU-LE-PETIT',
            'SAINT-DENIS-EN-BUGEY',
            'CHARNOZ-SUR-AIN',
            'CHAZEY-SUR-AIN',
            'MARCHAMP',
            'CULOZ',
            'MANTENAY-MONTLIN',
            'MARBOZ',
            'FOISSIAT',
            'TREFFORT-CUISIAT',
            'IZIEU',
            'SAINT-ETIENNE-DU-BOIS',
            'HAUTEVILLE-LOMPNES',
            'SAINT-TRIVIER-SUR-MOIGNANS',
            'PEYRIAT',
            'EVOSGES',
            'PONCIN',
            'CRANS',
            'MONTREAL-LA-CLUSE',
            'CLEYZIEU',
            'LOMPNIEU',
            'VILLEREVERSURE',
            'SAINT-MARTIN-DU-MONT',
            'SAINT-GENIS-POUILLY',
            'BOLOZON',
            'CONFRANCON',
            'LOCHIEU',
            'CHANOZ-CHATENAY',
            'VILLEBOIS',
            'CEIGNES',
            'SAINT-DIDIER-SUR-CHALARONNE',
            'REVONNAS',
            'BOURG-SAINT-CHRISTOPHE',
            'CONDEISSIAT',
            'PIRAJOUX',
            'CHALAMONT',
            'LE PLANTAY',
            'VERSAILLEUX',
            'MONTAGNAT',
            'VIEU',
            'SAINT-ANDRE-DE-CORCY',
            'BRESSOLLES',
            'PERONNAS',
            'COLOMIEU',
            'MONTHIEUX',
            'SAINT-JEAN-SUR-REYSSOUZE',
            'GARNERANS',
            'MONTREVEL-EN-BRESSE',
            'CONAND',
            'CHALLES-LA-MONTAGNE',
            'MOGNENEINS',
            'THOISSEY',
            'CHALEINS',
            'NEUVILLE-SUR-AIN',
            'THIL',
            'JUJURIEUX',
            'ONCIEU',
            'LURCY',
            'BALAN',
            'AMBUTRIX',
            'SAINTE-CROIX',
            'BLYES',
            'CONZIEU',
            'NIEVROZ',
            'NURIEUX-VOLOGNAT',
            'AMBLEON',
            'SAINT-MAURICE-DE-GOURDANS',
            'CHEZERY-FORENS',
            'SAULT-BRENAZ',
            'MURS-ET-GELIGNIEUX',
            'LE PETIT-ABERGEMENT',
            'CORMOZ',
            'SAINT-MARTIN-DE-BAVEL',
            'SAINT-TRIVIER-DE-COURTES',
            'BOYEUX-SAINT-JEROME',
            'CHATEAU-GAILLARD',
            'PREMEYZEL',
            'ARANDAS',
            'CHATENAY',
            'INNIMOND',
            'BOZ',
            'BRIORD',
            'REYRIEUX',
            'MATAFELON-GRANGES',
            'DROM',
            'CHATILLON-EN-MICHAILLE',
            'POLLIAT',
            'VESANCY',
            'MASSIEUX',
            'SAINT-CYR-SUR-MENTHON',
            'SERRIERES-SUR-AIN',
            'NIVOLLET-MONTGRIFFON',
            'IZERNORE',
            'SAINT-NIZIER-LE-DESERT',
            'GUEREINS',
            'ILLIAT',
            'LA TRANCLIERE',
            'SAINT-DIDIER-DE-FORMANS',
            'MERIGNAT',
            'SAINT-ELOI',
            'LA CHAPELLE-DU-CHATELARD',
            'SAINT-JEAN-DE-NIOST',
            'SAVIGNEUX',
            'NATTAGES',
            'SAINT-BENOIT',
            'DOUVRES',
            'FRANCHELEINS',
            'DORTAN',
            'SAINT-GERMAIN-LES-PAROISSES',
            'MIRIBEL',
            'LANCRANS',
            'ECHENEVEX',
            'SAINT-JEAN-SUR-VEYLE',
            'BILLIAT',
            "LABERGEMENT-DE-VAREY",
            'VILLENEUVE',
            'VILLARS-LES-DOMBES',
            'THEZILLIEU',
            'SAINT-ETIENNE-SUR-REYSSOUZE',
            'SOUCLIN',
            'SAINT-JUST',
            'CIVRIEUX',
            'ARGIS');

        foreach ($vars as $v)
        {
            $this->newEntity($v);
        }
    }

    private function newEntity($param)
    {
        $en = new Ville();
        $en->setNom($param);
        $this->manager->persist($en);
    }

}

<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SymfonyStyleCommand extends Command{
    protected function configure()
    {
//        birinci funtion kesinlikle configure function i olmali
//        komuta verilecek ad yazilir
        $this-> setName('app:symfony:style')
            ->setDescription('size guzel output verir SymfonyStyle')
            ->setHelp('php bin/console app:symfony:style veya a:s:s  seklinde calistirilabilir')

 ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $output->writeln('Merhaba SymfonyStyle dan');
        $io=new SymfonyStyle($input,$output);

//        title yazdirmak icin
        $io->title('Mukemmel title');

//        section sonuclari parcalara ayirmak icin kullniliyor.
        $io->section('Mukemmel Section');

//        text : uzun bir sonuc verilecekse text kullanilabilir
        $io->text('Merhaba bu icerik');
//        text array de kabul ediyor
        $io->text([
            'Merhaba gunduz',
            'Merhaba bu text array icerir',
            'Merhaba symfonyStyle dan'
        ]);

//        listing :listeleme yapilabilir
        $io->listing([
           'item1',
           'item2',
           'item3',
        ]);

//        Table olusturulabilir
        $io->table(
            ['ad','soyad'],
            [['ali','can'],
            ['veli','san'],
            ['mert','ham',],
            ['eymen','zeliha'],]
        );

//        yeni bir satir koymak istedigimizde
        $io->newLine(2);

//        note ekelenebilir bilgi verme amacli
        $io->note('Fransa iyi bir ulke');

//        caution eklenebilir dikkat cekme amacli
        $io->caution('yeterince uyku uyunmalidir');

//      progressbar : adim adim yapilacak seyler var onu da progras baslarla takip ediyoruz
        $io->progressStart(100);
        foreach (range(0,100) as $item){
            $io->progressAdvance(1);
//            sleep(1);
                  }
        $io->progressFinish();

//        ask : kullaniciya sorular soarabiliriz.
        $io->ask('Hangi rengi seversin?');

  }

}
<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command{
    protected function configure()
    {
//        birinci funtion kesinlikle configure function i olmali
//        komuta verilecek ad yazilir
        $this-> setName('app:hello')
            ->setDescription('size guzel bir Hello mesaji veir')
            ->setHelp('php bin/console app:hello  seklinde calistirilabilir')

            //burada arguments adi , tanimi  istersek default degeri ekliyoruz
//            ->addArgument('name',InputArgument::OPTIONAL, 'Kime selam vermemi istersin','eymen')
//            ->addArgument('name',InputArgument::OPTIONAL, 'Kime selam vermemi istersiniz')

//         simdi de array olarak alcagiz
//            ->addArgument('names',InputArgument::IS_ARRAY, 'Kimlere selam vermemi istersiniz')

//        birden fazla requirement ekleyebiliriz.
            ->addArgument('name',InputArgument::REQUIRED, 'selam verilecek ksinin adi optinonal')
            ->addArgument('soyad',InputArgument::OPTIONAL, 'selam verilecek kisinin adi required')
            ->addOption('yas','y',InputOption::VALUE_OPTIONAL,'yasinizi yazin!!','63')
        ;

 }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        ikinciside execute olacak iki tane parametresi var kullanicidan input alacak onu output yapacak
//        $name=$input->getArgument('name');

       //default degerini farkli bir sekilde ayirladik.
//        if(empty($name)){$name='halime';}
        //        var_dump($names); ->ekrana array i yazdirir

        $name=$input->getArgument('name');
        $soyad=$input->getArgument('soyad');
        if(!empty($soyad)){
        $name=$name.' '.$soyad;
        }
        $yas=$input->getOption('yas');
        $output->writeln('Merhaba '.$name);
        $output->writeln(printf('yasiniz %s sinirim:',$yas));
//        array li cikti icin kullanmistik
//        $output->writeln('Merhaba guzel insan  '.implode(", ",$names));
  }

}
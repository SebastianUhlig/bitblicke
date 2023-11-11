<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;

class Course extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.app.pages.course';


    /*
     * Schritte für Kurse:
     * Ich habe mehrere Kurse zur Auswahl
     * Klicke ich auf einen Kurs, der mir gefällt, habe ich eine beliebige Anzahl an Abschnitten
     * Jeder Abschnitt hat einen eigenen Untertitel und einen Inhalt (Text, Code, etc.)
     * Es wird getracked, wie viele Abschnitte ich von einem Kurs mir angesehen habe.
     * Habe ich in einen Abschnitt aufgehört (oder unterbrochen), wird mir in der Übersicht der Abschnitt des Kurses vorgeschlagen, um ihn fortzufahren.
     * Pro Abschnitt gibt es eine geschätzte Zeitangabe, die anhand der Wörter gezählt wird, wie lange der Kurs dauern kann(!)
     * */

}

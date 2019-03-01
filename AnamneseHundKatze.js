let app = angular.module('myEditorApp', []);
app.controller('myEditorCtrl', function ($scope, $filter) {

    let whatBox = function () {
        return $scope.grosseBox ? '3,50m' : '3m';
    };

    let rentLength = function () {
        return $scope.zeitUnbestimmt ? ' und läuft auf unbestimmte Zeit.' : ' und endet am ' + $filter('date')($scope.tagMietende, 'dd.MM.yyyy');
    };

    let rentBox = function (m, a) {
        let mm = $filter('number')(parseFloat(m) , 2);
        let ma = $filter('number')(parseFloat(m) + parseFloat(a) , 2);
        let m1 = 'Der monatliche Pensionspreis beträgt ' + mm + ' €.';
        let m2 = 'Der monatliche Pensionspreis beträgt in den ersten drei Monaten ' + ma + ' €. Danach beträgt er ' + mm + ' €.';
        return $scope.zeitUnbestimmt ? m1 : m2;
    };

    $scope.onPrint = function () {
        let docDefinition = {
            header: function (currentPage, pageCount) {
             return {
             margin: [40,30,30,30],
             columns: [
             {
             width: '*',
             text: 'Tierheilpraxis\nHeike\nLemke\ni.Gr.,\nNienredder\n10B,\n22527\nHamburg',
             style: 'company'
             },
             {
             width: '150',
             text: $filter('date')(new Date(), 'dd.MM.yyyy') +
             '\nTel.: +49(0)176/34798633\nmail:heikelemke85@web.de\nSeite ' +
             currentPage.toString() + ' von ' + pageCount,
             style: 'company',
             alignment: 'right'
             }
             ]
             }
             },
            footer: function (currentPage, pageCount) {
                return {
                    margin: [60, 0, 0, 0],
                    table: {
                        width: ['auto', 'auto', 'auto', 'auto'],
                        body: [
                            [
                                {
                                    border: [false, true, false, false],
                                    text: 'Tierheilpraxis\nHeike\nLemke\ni.Gr.\nGeschäftsführer\nHeike Lemke\nTel.: +49(0)176/34798633',
                                    style: 'companySmall'

                                },
                                {
                                    border: [false, true, false, false],
                                    text: 'Bank xxxxxxxxxxxxxxx\nIBAN DExx xxxx xxxx xxxx xxxx xx\nBIC xxxx xxx xxxx\nEmail: heikelemke85@web.de',
                                    style: 'companySmall'

                                },
                                {
                                    border: [false, true, false, false],
                                    text: 'Finanzamt Hamburg\nStnr. xxx/xxx/xxxxx\nweb: www.tierheilpraxis-heike-lemke.de',
                                    style: 'companySmall'
                                },
                                {
                                    border: [false, true, false, false],
                                    text: 'Seite ' + currentPage.toString() + ' von ' + pageCount,
                                    style: 'companySmall'
                                }
                            ]
                        ]
                    },
                    layout: {
                        hLineColor: 'grey',
                    }
                }
            },
            content: [
                {
                    text: 'Anamnesebogen',
                    style: 'headline'
                },
                {
                    text: [
                        'Zwischen\n',
                        'Reitsport Walther & Finger GbR\n',
                        'Barriser Weg 64\n',
                        '24787 Fockbek\n',
                        'im Folgenden „Betrieb“ genannt\n',
                        'und'
                    ],
                    style: 'Betrieb'
                },
                {
                    text: [
                        $scope.name + '\n',
                        $scope.strasse + '\n',
                        $scope.plzOrt + '\n',
                        'im Folgenden „Einsteller“ genannt',
                    ],
                    style: 'Betrieb'
                },
                {
                    ol: [
                        [
                            {
                                text: 'Vertragsgegenstand',
                                style: 'subheader'
                            },
                            {
                                ol: [
                                    'Es handelt sich explizit um einen Mietvertrag und nicht um einen Verwahrungsvertrag!\n',
                                    {
                                        text: 'Für die Einstellung des Pferdes "' + $scope.pferdeName + '" wird im Stallgebäude des Betriebes eine Box ca. 3m x ' + whatBox() + ' vermietet.'
                                    },
                                    'Die Benutzung der geschlossenen und offenen Reitbahn ist dem Einsteller laut der Betriebs- und Reitordnung gestattet, die Bestandteil dieses Vertrages ist.',
                                    ['Im Einzelnen umfaßt die Einstellung folgende Leistungen:',
                                        {
                                            ul: [
                                                'Benutzung der Reitanlagen gemäß Absatz 2',
                                                'Lieferung und Gabe von Einstreu',
                                                'Lieferung und Gabe von Heu und/oder Silage',
                                                'Lieferung und Gabe von Mineralfutter und Hafer nach Bedarf des Pferdes in Absprache mit dem Einsteller',
                                                'Gabe von Kraftfutter und anderen Zusatzfuttermitteln nach Bedarf des Pferdes in Absprache mit dem Einsteller',
                                                'Weidegang nach Maßgabe des Betriebes',
                                                'Entmisten der Boxen',
                                                'Bereitstellung von Licht und Wasser',
                                                'Benutzung des Waschplatzes',
                                                'Benutzung der Sattelkammer',
                                                'Benutzung der Aufenthaltsräume und der sanitären Anlagen',
                                                'Aushändigung eines Schlüssels für die Schließanlage gegen Pfand'
                                            ]
                                        }],
                                    'Die Futtergabe / Futterhäufigkeit kann nach Vereinbarung erhöht / vermindert werden.',
                                    'Stallhalfter und Anbinderiemen sind vom Einsteller selbst zu stellen.'
                                ]
                            }
                        ],
                        [{
                            text: 'Vertragszeitraum, Kündigung',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Der Vertrag beginnt am ' + $filter('date')($scope.tagMietbeginn, 'dd.MM.yyyy') + rentLength(),
                                    'Der Vertrag kann jederzeit zum Monatsende gekündigt werden. Die Kündigung bedarf der Schriftform.',
                                    ['Der Vertrag kann ohne Einhalten einer Kündigungsfrist nur aus wichtigem Grund gekündigt werden. Ein wichtiger Grund liegt insbesondere vor, wenn',
                                        {
                                            ul: [
                                                'der Einsteller mit der jeweils geschuldeten Vergütung einen Monat im Rückstand ist oder',
                                                'die Betriebs- und Reitordnung trotz Abmahnung wiederholt oder – auch ohne vorherige Abmahnung – schwerwiegend verletzt wird.'
                                            ]
                                        }],
                                ]
                            },
                            'Die Regelung gilt auch für einen wichtigen Grund aus dem Verhalten einer Person, die der Einsteller mit dem Reiten der Pferde oder mit sonstigen in den Bereich dieses Vertrages fallenden Verrichtungen betraut hat.'
                        ],
                        [{
                            text: 'Pensionspreis',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    rentBox($scope.boxenMiete, $scope.aufschlag),
                                    'Pensionspreis und Nutzungsgebühr sind im Voraus bis spätestens zum 3. Tage des laufenden Monats auf das Konto mit der IBAN DE86 2146 3603 0005 4678 02 BIC GENO DEF1 NTO bei der Raiffeisenbank im Kreis Rendsburg zu zahlen.',
                                    'Vorübergehende Abwesenheit (Turnierbesuch etc.) der eingestellten Pferde oder dauerhafter Weidegang wird nicht auf den Pensionspreis und die Nutzungsgebühr in Anrechnung gebracht.',
                                    'Verspätete Zahlung des Pensionspreises oder der Nutzungsgebühr berechtigt den Betrieb, eine Mahngebühr von 2,50 € für jede Mahnung und Verzugszinsen in Höhe von 12% p.a. für die Wartezeit zu erheben.'
                                ]
                            }],
                        [{
                            text: 'Aufrechnungsverbot und Rückbehaltungsrecht',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Die Aufrechnung des Einstellers gegenüber dem Pensionspreis mit einer Gegenforderung ist ausgeschlossen; es sei denn, daß die Gegenforderung rechtskräftig festgestellt ist oder vom Betriebsinhaber nicht bestritten wird.',
                                    'Der Betrieb hat wegen fälliger Forderungen gegen den Einsteller ein Zurückbehaltungsrecht am Pferd des Einstellers und ist befugt, sich aus dem zurückbehaltenen Pferd zu befriedigen. Die Befriedigung erfolgt nach den für das Pfandrecht geltenden Vorschriften des BGB. Die Verkaufsberechtigung tritt zwei Wochen nach Verkaufsandrohung ein.'
                                ]
                            }],
                        [{
                            text: 'Sorgfaltspflicht des Betriebes',
                            style: 'subheader'
                        },
                            'Der Betrieb verpflichtet sich, das eingestellte Pferd mit der Sorgfalt eines ordentlichen und gewissenhaften Pflegers zu füttern, zu pflegen und Krankheiten und besondere Vorkommnisse unverzüglich nach Bekanntwerden dem Einsteller zu melden.'
                        ],
                        [{
                            text: 'Auskunftspflicht des Einstellers, Haftpflichtversicherung',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Der Einsteller verpflichtet sich, Auskunft hinsichtlich fremder Eigentumsrechte an den Pferden zu erteilen. Er versichert, daß die Pferde nicht von einer an steckenden Krankheit befallen sind oder aus einem verseuchten Stall kommen. Der Betrieb ist berechtigt, hierfür gegebenenfalls einen tierärztlichen Bericht auf Kosten des Einstellers zu verlangen.',
                                    'Der Einsteller hat dem Betrieb den Abschluß einer Reitpferdehaftpflichtversicherung nachzuweisen.'
                                ]
                            }
                        ],
                        [{
                            text: 'Hufbeschlag und Tierarzt',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Die Kosten des Hufbeschlages trägt der Einsteller. Der Betrieb ist berechtigt, für Rechnung des Einstellers einen Beschlagschmied zu beauftragen.',
                                    'Der Betrieb kann im Namen des Einstellers einen Tierarzt bestellen, wenn die Hinzuziehung erforderlich ist. In nicht dringenden Fällen ist die Zustimmung des Einstellers einzuholen.'
                                ]
                            }
                        ],
                        [{
                            text: 'Bauliche Veränderungen, Abtretung der Rechte an Dritte',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Der Einsteller ist nicht berechtigt, ohne Zustimmung des Betriebes bauliche Veränderungen an der Anlage oder im Stall vorzunehmen.',
                                    'Jede Veränderung hinsichtlich des eingestellten Pferdes ist dem Betrieb unverzüglich anzuzeigen, insbesondere ist der Einsteller nicht berechtigt, Boxen an Dritte abzugeben.'
                                ]
                            }
                        ],
                        [{
                            text: 'Schäden durch die eingestellten Pferde, Tierhalterhaftpflicht',
                            style: 'subheader'
                        },
                            'Der Einsteller hat für Schäden aufzukommen, die an den Einrichtungen des Stalles und den Reitbahnen durch ihn oder sein Pferd oder einen mit dem Reiten seines Pferdes Beauftragten verursacht werden.'
                        ],
                        [{
                            text: 'Sorgfaltspflicht, Haftung und Versicherungen des Betriebes',
                            style: 'subheader'
                        },
                            {
                                ol: [
                                    'Der Betrieb haftet nicht für Schäden an den eingestellten Pferden oder sonstigen Sachen des Einstellers, soweit der Betrieb nicht gegen diese Schäden versichert ist oder diese Schäden nicht auf Vorsatz oder grobfahrlässigem Verhalten des Betriebes oder eines Gehilfen beruhen.',
                                    'Der Einsteller erkennt ausdrücklich an, daß er über den Rahmen der vorliegen den Versicherungen unterrichtet ist und nur hieraus und in den Fällen des Absatzes 1 Ansprüche gegen den Betrieb geltend machen kann.'
                                ]
                            }
                        ],
                        [{
                            text: 'Ausbildung',
                            style: 'subheader'
                        },
                            'Die Ausbildung des Pferdes oder des Reiters ist Gegenstand besonderer Vereinbarungen.'

                        ],
                        [{
                            text: 'Pferdepass',
                            style: 'subheader'
                        },
                            'Der Pferdepass ist beim Pferd zu führen. Daher muss er stets in der Reitanlage verfügbar sein, solange das Pferd vor Ort ist. Der Betrieb weist den Einsteller in das Verwahrungskonzept ein.'

                        ],
                        [{
                            text: 'Änderungen, Nebenabreden',
                            style: 'subheader'
                        },
                            'Änderungen dieses Vertrages bedürfen in jedem Falle der Schriftform. Mündliche Erklärungen sind unwirksam. Sollten einzelne Vertragsteile unwirksam sein, besteht der Vertrag im übrigen weiter.'
                        ],
                        [{
                            text: 'Gerichtsstand und Erfüllungsort',
                            style: 'subheader'
                        },
                            'Gerichtsstand und Erfüllungsort ist Rendsburg.'
                        ]
                    ],
                    lineHeight: 1.4
                }/*,
                {
                    margin: [0, 20, 0, 60],
                    text: 'Fockbek, den ' + $filter('date')($scope.tagDesVertrages, 'dd.MM.yyyy')
                },
                {
                    style: 'tableExample',
                    table: {
                        widths: ['*', 100, '*'],
                        body: [
                            [
                                {
                                    border: [false, true, false, false],
                                    text: 'für den Betrieb:',
                                    alignment: 'center'
                                },
                                {
                                    border: [false, false, false, false],
                                    text: '',
                                    alignment: 'center'
                                },
                                {
                                    border: [false, true, false, false],
                                    text: 'für den Einsteller:',
                                    alignment: 'center'
                                }
                            ]
                        ]
                    }
                }*/
            ],
            pageSize: 'A4',
            pageMargins: [50, 50, 50, 90],
            styles: {
                company: {
                    color: 'black',
                    fontSize: 12
                },
                companySmall: {
                    color: 'grey',
                    fontSize: 8,
                    alignment: 'center'
                },
                headline: {
                    bold: true,
                    color: 'black',
                    fontSize: 24,
                    decoration: 'underline',
                    margin: [0, 0, 0, 10],
                    alignment: 'center'
                },
                subheader: {
                    fontSize: 16,
                    margin: [0, 10, 0, 10]
                },
                Betrieb: {
                    bold: true,
                    color: 'black',
                    fontsize: 14,
                    margin: [10, 10, 10, 10],
                    alignment: 'center'
                },
                tableExample: {
                    margin: [10, 5, 10, 10],
                }
            }
        };
        pdfMake.createPdf(docDefinition).open();
    }
})
;



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Imprimir WhiteLabel</title>
    </head>
    <body style="color: black;">
        <div id="app">
            <button type="button" @click="printTicket">Imprimir Ticket</button>
            <pre>
{{print}}
            </pre>
        </div>

        <script src="http://unpkg.com/vue@2.5.16/dist/vue.js"></script>
        <script src="http://unpkg.com/socket.io-client@2.1.1/dist/socket.io.js"></script>

        <script>
            const $app = new Vue({
                el: '#app',
                data: function () {
                    return {
                        socket: io('http://192.168.0.18:2021'),
                        print: {
                            letters: 42,
                            head: {
                                title: 'Bet Connections',
                                description: ''
                            },
                            body: [
                                {type: 'TextMini', 'left': 'Ticket:', 'right': '#34607-0135'},
                                {type: 'TextMini', 'left': 'Fecha:', 'right': '14/06/18 09:41 AM'},
                                {type: 'TextMini', 'left': 'Nombre de Usuario:', 'right': 'SportsWEB'},
                                {type: 'TextMini', 'left': 'Codigo Seguridad:', 'right': 'JRGBRHW5DY'},
                                {type: 'newLine', number: 1},
                                {type: 'TextMini', 'left': 'Tigres de Quintana Roo vs Leones de Yucatan', 'right': ''},
                                {type: 'TextMini', 'left': 'Liga Mexicana, Playoffs', 'right': ''},
                                {type: 'TextMini', 'left': '14-06-2018 08:00:00 PM', 'right': ''},
                                {type: 'TextMini', 'left': 'Leones de Yucatan', 'right': '+145'},
                                {type: 'TextMini', 'left': 'Ganador (1X2) (Tiempo Regl.)', 'right': ''},
                                {type: 'horizontalLine'},
                            ],
                            footer: [
                                '- Este ticket caduca a los 60 dias luego de su expedicion.',
                                '- Los pagos se efectuan indefectiblemente con la presencia del ticket.',
                                '- En el caso de un error en la linea, rotacion, hora programado, maxima apuesta, apuestas fuera de tiempo o comenzado el evento, las apuestas seran "Canceladas" y el monto del arriesgado sera devuelto en consecuencia.',
                                '- Declaro conocer y acepto las reglas.'
                            ]
                        }
                    }
                },
                mounted: function () {
                    
                },
                methods: {
                    printTicket: function () {
                        const id = prompt('Ingrese el id del dispositivo.', '')

                        if (id) {
                            this.socket.emit('print', {id, print: this.print})
                        }
                    }
                }
            })
        </script>
    </body>
</html>
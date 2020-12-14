<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Socket</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    {{--  // #region Laravel Echo CDN  --}}
    {{--  https://www.jsdelivr.com/package/npm/laravel-echo  --}}
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.9.0/dist/echo.common.min.js"></script>
    {{--  https://cdnjs.com/libraries/pusher  --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    {{--  // #endregion  --}}

    <style>
        pre {
            font-family: "Courier 10 Pitch", Courier, monospace;
            font-size: 95%;
            line-height: 140%;
            white-space: pre;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -o-pre-wrap;
            display: block;
            padding: 0.5em 1em;
            border-left: 1px solid #bebab0;
            background-color: #e7e7e740;
        }

        .log {
            font-family: 'Open Sans', sans-serif;
            font-size: 95%;
            line-height: 140%;
            white-space: pre;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -o-pre-wrap;
            display: block;
            padding: 0.5em 1em;
            border-top: 1px solid #68e400;
            border-bottom: 1px solid #68e400;
            background-color: #3c3c3c;
            margin-top: 10px;
            margin-bottom: 10px;
            overflow-y: auto;
            height: 400px;
            color: white;
        }

        .container {
            background: white;
            margin-top: 20px;
            margin-left: 60px;
            margin-right: 60px;
            padding: 30px;
            border-radius: 5px;
            color: black;
        }

        .line {
            width: 100%;
            border-bottom: 1px black solid;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
        }
    </style>
</head>
    <body>
        <div class="container">
            <h1>DEBUG SOCKETS PANEL</h1>
            <div class="line"></div>
        
            <h2> README.md </h2>
        
            {{--  How to use sockets on client side  --}}           
        
            <div class="line"></div>
            <h4>DEBUG PANEL</h4>
            <div class="line"></div>
        
            <h6>SERVER ADDRESSES</h6>        
            SERVER_HOST = <input onchange="setServerHost(this.value)" id="SERVER_HOST" value="http://127.0.0.1:8081"><br/><br/>
            SOCKET_HOST = <input onchange="setSocketHost(this.value)" id="SOCKET_HOST" value="http://127.0.0.1:6001"><br/>
            <hr/>
        
            <h6>GET BEARRER ACCSESS TOKEN FOR USING TOKEN</h6>
            Hi dear friend, firstly auth in system for using sockets
            <br/><br/>
            USER AUTH ROUTE: <input id="auth_route" name="auth_route" value="/api/auth/login" />

            <br/><br/>
            <form id="auth">
                <input name="email" value="user1@gmail.com" placeholder="username" />
                <input name="password" value="476674" placeholder="Password" />
                {{--  <input name="deviceId" value="deviceqwerty123" placeholder="deviceId" />  --}}
                <input type="submit" onclick="login()">
            </form>
        
            <div class="line"></div>
            ADMIN AUTH ROUTE: <input id="admin_auth_route" name="admin_auth_route" value="/api/admin/auth/login" /><br/><br/>
            <form id="authAdmin">
                <input name="email" value="admin@gmail.com" />
                <input name="password" value="476674" />
                <input type="submit" onclick="loginAdmin()">
            </form>
        
            {{--  </form>  --}}
            <div id="login_status"></div>
        
            <hr />        
            {{--  <h5>SOCKET INFO</h5>
            APP_ID <input id="socketKey" name="socketKey" value="test" placeholder="socketKey" /> <br/><br/> 
            APP_KEY <input id="appKey" name="authKey" value="b8a3aa6678dc21c482bbe4f1c9ea11b8" />
            <button type="button" onclick="getInfo()">Load</button>
            <br/><br/>
            <span>Status</span>
            <pre id="status"></pre>
            <span>Channels</span>
            <pre id="channels"></pre>
            <hr/>  --}}
        
            <h5> BASE INIT CHANNELS </h5>
            DEBUG CHANNEL: <input id="debug_channel_name" name="debug_channel_name" value="debug" /><br/><br/>
            DEBUG EVENT: <input id="debug_event_name" name="debug_event_name" value="TestEvent" />
        
            <h5>CONNECT TO CHANNEL</h5>
            GROUPS CHANNEL <input id="groups_channel_name" name="groups_channel_name" value="shipper" />
            <button type="button" onclick="connectGroupChannels()">Listen groups channel</button>
            <hr/>
            <br/><br/>
        
            {{-- NOTIFICATIONS CHANNEL <input id="notifications_channel_name" name="notifications_channel_name" value="shippers.1" />
            <button type="button" onclick="connectToNotificationChannel()">Listen notifications</button>
            <hr/> --}}

            <h6>CONNECT TO CHANNEL FOR LISTEN EVENTS</h6>
            CHANNEL <input id="channel_name" name="channel_name" value="debug" />
            <br/><br/>
        
            EVENT <input id="event" name="event" value="TestEvent" />
            <button type="button" onclick="connectToChannel()">Connect</button>
        
            <div class="line"></div>
            <h4>CHANNEL LOGS</h4>
            <div class="log" id="logs"></div>
        </div>
    </body>
    <script type="text/javascript">
        let client = false;
        let serverHost = document.getElementById('SERVER_HOST').value;
        let socketHost = document.getElementById('SOCKET_HOST').value;

        function setServerHost(value) {
            serverHost = value;
        }

        function setSocketHost(value) {
            socketHost = value;
        }

        let logs_count = 0;
        function logger(...args) {
            console.log(args);
            document.getElementById('logs').append(`${logs_count} | ${JSON.stringify(args)} \n`);
            logs_count++;
        }

        /** function getInfo() {
            let socketKey = document.getElementById('socketKey').value;
            let appKey = document.getElementById('appKey').value;
            try {
                fetch(`${socketHost}/apps/${socketKey}/status?auth_key=${appKey}`).then(function(res) {
                    res.json().then(json => document.getElementById('status').append(`${JSON.stringify(json)} \n`))
                })

                fetch(`${socketHost}/apps/${socketKey}/channels?auth_key=${appKey}`).then(function(res) {
                    res.json().then(json => document.getElementById('channels').append(`${JSON.stringify(json)} \n`))
                })
            } catch (e) {
                logger(e.message)
            }
        } **/

        function connectToChannel() {
            let channel_name = document.getElementById('channel_name').value;
            let event = document.getElementById('event').value;

            console.log(channel_name, event);

            client.private(channel_name).listen('.' + event, (e) => {
                                                            console.log('e: ', e);
                                                            logger('Event received: ', e);
                                                        }).notification((response) => {
                                                            console.log('response: ', response);
                                                            logger('Event notification received: ', response);
                                                        });
        
            client.private(channel_name)
                  .listen(event, ('.' + event) => {
                                        logger('Event received: ', event);
                                    }).notification((response) => {
                                        logger('Event notification received: ', response);
                                    });
        }

        function connectToNotificationChannel() {
            let channel_name = document.getElementById('notifications_channel_name').value;
            client.private(channel_name).notification((e) => {
                                                            logger('Notification received: ', e);
                                                        });
        }

        function connectGroupChannels() {
            let channel_name = document.getElementById('groups_channel_name').value;
            client.join(channel_name).here(users => {
                                                logger('Group users : ', users)
                                            }).joining((res) => {
                                                logger('Group response :', res)
                                            });
        }
    {{-- </script> --}}

    {{-- <script type="text/javascript"> --}}
        // import Echo from '/api/debug/libs/echo';
        // import Echo from '../../node_modules/laravel-echo';
        // import Echo from 'laravel-echo';
        // window.Pusher = require('pusher-js');
    
        let user = false;

        function login() {
            event.preventDefault();
    
            try {
                let authUrl = document.getElementById('auth_route').value;
                let formData = new FormData(document.getElementById('auth'));
                let data = {
                    email: formData.get('email'),
                    password: formData.get('password'),
                };
                fetch(`${serverHost}${authUrl}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).then(response => {
                    if (!response.ok) {
                        response.text().then(logger)
                    } else {
                        response.json().then(data => {
                            console.log('data: ', data);
                            user = data.user_data;
                            access_token = data.access_token;
                            initEcho(data.access_token);
                        })
                    }
                });
            } catch (ex) {
                logger(ex.message);
            }
        }
    
        function loginAdmin() {
            event.preventDefault();

            try {
                let authUrl = document.getElementById('admin_auth_route').value;
                let formData = new FormData(document.getElementById('authAdmin'));
                fetch(`${serverHost}${authUrl}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({email: formData.get('email'), password: formData.get('password')})
                }).then(res => {
                    if (!res.ok) {
                        res.text().then(logger)
                    } else {
                        res.json().then(data => {
                            user = data;
                            initEcho(data.token)
                        })
                    }
                });
            } catch (e) {
                logger(e.message)
            }
        }
    
        function initEcho(token = '') {
            console.log(window.location.hostname);

            client = new Echo({
                broadcaster: 'pusher',
                key: '{{ env('MIX_PUSHER_APP_KEY') }}',
                cluster: '{{ env('MIX_PUSHER_APP_CLUSTER') }}',
                wsHost: window.location.hostname,
                wsPort: 6001,
                forceTLS: false,
                disableStats: true,
                scheme: '{{ env('MIX_PUSHER_APP_SCHEME') }}',  // process.env.MIX_PUSHER_SCHEME
                auth: {
                    headers: {
                        Authorization: 'Bearer ' + token
                    }
                }
            });
    
            window.client = client;
    
            console.log('client.connector: ', client.connector);
            client.connector.pusher.connection.bind('failed', (event) => {
                logger('failed: ', event)
            });
    
            client.connector.pusher.connection.bind('disconnected', (event) => {
                logger('disconnected: ', event)
            });
    
            client.connector.pusher.connection.bind('unavailable', (event) => {
                logger('unavailable: ', event)
            });
    
            client.connector.pusher.connection.bind('connecting_in', (event) => {
                logger('connecting_in: ', event)
            });
    
            client.connector.pusher.connection.bind('message', (event) => {
                logger('message: ', event)
            });
    
            client.connector.pusher.connection.bind('connecting', (attemptNumber) => {
                // your code
                logger(`%cSocket reconnecting attempt ${attemptNumber}`, 'color:orange; font-weight:700;')
            });
    
            client.connector.pusher.connection.bind('connected', (event) => {
                logger("Client connected ", event);
                document.getElementById('login_status').append("Client connected \n");
            });
    
    
            client.private(document.getElementById('debug_channel_name').value)
                .listen('.' + document.getElementById('debug_event_name').value, (event) => {
                logger('Event received: ', event);
            });
        }
    </script>
</html>


<!DOCTYPE html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>New JavaScript SDK & OAuth 2.0 based FBConnect Tutorial | Thinkdiff.net</title>
        <!--
            @author: Mahmud Ahsan (http://mahmud.thinkdiff.net)
        -->
    </head>
    <body>
        <div id="fb-root"></div>
        <script type="text/javascript">
            var button;
            var userInfo;
 
            window.fbAsyncInit = function() {
                FB.init({ appId: '987149988019793',
                    status: true,
                    cookie: true,
                    xfbml: true,
                    oauth: true});
 
               showLoader(true);
 
               function updateButton(response) {
                    button       =   document.getElementById('fb-auth');
                    userInfo     =   document.getElementById('user-info');
 
                    if (response.authResponse) {
                        //user is already logged in and connected
                        FB.api('/me', function(info) {
                            login(response, info);
                        });
 
                        button.onclick = function() {
                            FB.logout(function(response) {
                                logout(response);
                            });
                        };
                    } else {
                        //user is not connected to your app or logged out
                        button.innerHTML = 'Login';
                        button.onclick = function() {
                            showLoader(true);
                            FB.login(function(response) {
                                if (response.authResponse) {
                                    FB.api('/me', function(info) {
                                        login(response, info);
                                    });
                                } else {
                                    //user cancelled login or did not grant authorization
                                    showLoader(false);
                                }
                            }, {scope:'email,user_birthday,status_update,publish_stream,user_about_me'});
                        }
                    }
                }
 
                // run once with current status and whenever the status changes
                FB.getLoginStatus(updateButton);
                FB.Event.subscribe('auth.statusChange', updateButton);
            };
            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol
                    + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());
 
            function login(response, info){
                if (response.authResponse) {
                    var accessToken                                 =   response.authResponse.accessToken;
 
                    userInfo.innerHTML                             = '<img src="https://graph.facebook.com/' + info.id + '/picture">' + info.name
                                                                     + "<br /> Your Access Token: " + accessToken;
                    button.innerHTML                               = 'Logout';
                    showLoader(false);
                    document.getElementById('other').style.display = "block";
                }
            }
 
            function logout(response){
                userInfo.innerHTML                             =   "";
                document.getElementById('debug').innerHTML     =   "";
                document.getElementById('other').style.display =   "none";
                showLoader(false);
            }
 
            //stream publish method
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
                showLoader(true);
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {
                    showLoader(false);
                });
 
            }
            function showStream(){
                FB.api('/me', function(response) {
                    //console.log(response.id);
                    streamPublish(response.name, 'I like the articles of Thinkdiff.net', 'hrefTitle', 'http://thinkdiff.net', "Share thinkdiff.net");
                });
            }
 
            function share(){
                showLoader(true);
                var share = {
                    method: 'stream.share',
                    u: 'http://www.searchb4kharch.com/Landingpage/Product/Mobiles/9D79A928/moto_g_(3rd_generation).html'
                };
 
                FB.ui(share, function(response) {
                    showLoader(false);
                    console.log(response);
                });
            }
 
            function graphStreamPublish(){
                showLoader(true);
 
                FB.api('/me/feed', 'post',
                    {
                        message     : "I love thinkdiff.net for facebook app development tutorials",
                        link        : 'http://ithinkdiff.net',
                        picture     : 'http://thinkdiff.net/iphone/lucky7_ios.jpg',
                        name        : 'iOS Apps & Games',
                        description : 'Checkout iOS apps and games from iThinkdiff.net. I found some of them are just awesome!'
 
                },
                function(response) {
                    showLoader(false);
 
                    if (!response || response.error) {
                        alert('Error occured');
                    } else {
                        alert('Post ID: ' + response.id);
                    }
                });
            }
 
            function fqlQuery(){
                showLoader(true);
 
                FB.api('/me', function(response) {
                    showLoader(false);
 
                    //http://developers.facebook.com/docs/reference/fql/user/
                    var query       =  FB.Data.query('select name, profile_url, sex, pic_small from user where uid={0}', response.id);
                    query.wait(function(rows) {
                       document.getElementById('debug').innerHTML =
                         'FQL Information: '+  "<br />" +
                         'Your name: '      +  rows[0].name                                                            + "<br />" +
                         'Your Sex: '       +  (rows[0].sex!= undefined ? rows[0].sex : "")                            + "<br />" +
                         'Your Profile: '   +  "<a href='" + rows[0].profile_url + "'>" + rows[0].profile_url + "</a>" + "<br />" +
                         '<img src="'       +  rows[0].pic_small + '" alt="" />' + "<br />";
                     });
                });
            }
 
            function setStatus(){
                showLoader(true);
 
                status1 = document.getElementById('status').value;
                FB.api(
                  {
                    method: 'status.set',
                    status: status1
                  },
                  function(response) {
                    if (response == 0){
                        alert('Your facebook status not updated. Give Status Update Permission.');
                    }
                    else{
                        alert('Your facebook status updated');
                    }
                    showLoader(false);
                  }
                );
            }
 
            function showLoader(status){
                if (status)
                    document.getElementById('loader').style.display = 'block';
                else
                    document.getElementById('loader').style.display = 'none';
            }
 
        </script>
 
        <h3>New JavaScript SDK & OAuth 2.0 based FBConnect Tutorial | Thinkdiff.net</h3>
        <button id="fb-auth">Login</button>
        <div id="loader" style="display:none">
            <img src="ajax-loader.gif" alt="loading" />
        </div>
        <br />
        <div id="user-info"></div>
        <br />
        <div id="debug"></div>
 
        <div id="other" style="display:block">
            <a href="#" onclick="showStream(); return false;">Publish Wall Post</a> |
            <a href="#" onclick="share(); return false;">Share With Your Friends</a> |
            <a href="#" onclick="graphStreamPublish(); return false;">Publish Stream Using Graph API</a> |
            <a href="#" onclick="fqlQuery(); return false;">FQL Query Example</a>
 
            <br />
            <textarea id="status" cols="50" rows="5">Write your status here and click 'Status Set Using Legacy Api Call'</textarea>
            <br />
            <a href="#" onclick="setStatus(); return false;">Status Set Using Legacy Api Call</a>
        </div>
    </body>
</html>
/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');


/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyAKYUly3_yZ-quFZ8iQX-F7w8S2JCQk-jM",
    authDomain: "fire-base-e0118.firebaseapp.com",
    // databaseURL: "https://XXXX.firebaseio.com",
    projectId: "fire-base-e0118",
    storageBucket: "fire-base-e0118.appspot.com",
    messagingSenderId: "116964932833",
    appId: "1:116964932833:web:3a1a897e4508854f598ba0",
    measurementId: "G-HWTR5BKLKN"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});

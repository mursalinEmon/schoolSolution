//sample client file will be use in every controller script() function 

                function urlBase64ToUint8Array(base64String) {
                    const padding = '='.repeat((4 - base64String.length % 4) % 4);
                    const base64 = (base64String + padding)
                    .replace(/-/g, '+')
                    .replace(/_/g, '/');

                    const rawData = window.atob(base64);
                    const outputArray = new Uint8Array(rawData.length);

                    for (let i = 0; i < rawData.length; ++i) {
                    outputArray[i] = rawData.charCodeAt(i);
                    }
                    return outputArray;
                }

                const publicVapidKey = 'BNr9wy0JNTydZEgizFH3p3xDxK11RGy9qUTMkLmg3vdvj_DINoPIIj220LfFERTHAjTLFnW5VyiRTPnqWtUZURE';

                const triggerPush = document.querySelector('.trigger-push');

                async function triggerPushNotification() {
                    if ('serviceWorker' in navigator) {
                    const register = await navigator.serviceWorker.register('./worker.js', {
                        scope: '/bdvendor/'
                    });
                    await navigator.serviceWorker.ready;
                    const subscription = await register.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array(publicVapidKey),
                    });

                    await fetch('http://localhost:5000/subscribe', {
                        method: 'POST',
                        body: JSON.stringify(subscription),
                        headers: {
                        'Content-Type': 'application/json'
                        },
                    });
                    } else {
                    console.error('Service workers are not supported in this browser');
                    }
                }

                triggerPush.addEventListener('click', () => {
                    triggerPushNotification().catch(error => console.error(error));
                });
            
                
<div class="share-blackout" data-modal="share">
    <div class="share-modal">
        <button class="close-share-modal active ms-auto">
            <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel">
        </button>

        <h4 class="share-modal__items_title h4 mb-4">Share to</h4>

        <div class="share-modal__items" x-data="{ message : $wire.getImageUrl() }">
            <div class="share-modal__item d-flex flex-column align-items-center">
                <button
                    id="share-whatsapp"
                    x-on:click="
                        window.open(
                            `https://api.whatsapp.com/send?text=${encodeURIComponent('I did this beautiful set up here: ' + (await message))}`,
                            '_blank',
                            'width=600,height=400'
                        );
                    ">
                    <img src="{{ asset('img/icons/Whatsapp.svg') }}" alt="Whatsapp">
                </button>

                <span class="share-modal__item_title mt-2">WhatsApp</span>
            </div>

            <div class="share-modal__item d-flex flex-column align-items-center">
                <button
                    id="share-facebook"
                    x-on:click="
                        window.open(
                            `https://www.facebook.com/dialog/share?app_id=YOUR_APP_ID&display=popup&href=${encodeURIComponent(await message)}`,
                            '_blank',
                            'width=600,height=400'
                        );
                    ">
                    <img src="{{ asset('img/icons/Facebook.svg') }}" alt="Facebook">
                </button>

                <span class="share-modal__item_title mt-2">Facebook</span>
            </div>

            <div class="share-modal__item d-flex flex-column align-items-center">
                <button
                    id="share-telegram"
                    x-on:click="
                        window.open(
                            `https://t.me/share/url?url=${encodeURIComponent(await message)}&text=${encodeURIComponent('I did this beautiful set up here!')}`,
                            '_blank',
                            'width=600,height=400'
                        );
                    ">
                    <img src="{{ asset('img/icons/Telegram.svg') }}" alt="Telegram">
                </button>
                <span class="share-modal__item_title mt-2">Telegram</span>
            </div>

            <div class="share-modal__item d-flex flex-column align-items-center">
                <button
                    id="share-gmail"
                    x-on:click="
                        const subject = 'Check this out!';
                        const body = encodeURIComponent('I did this beautiful setup here: ' + (await message));
                        window.open(
                            `mailto:?subject=${subject}&body=${body}`,
                            '_blank'
                        );
                    ">
                    <img src="{{ asset('img/icons/gmail-pr.svg') }}" width="48px" height="48px" alt="Email">
                </button>

                <span class="share-modal__item_title mt-2">Email</span>
            </div>

            <div class="share-modal__item d-flex flex-column align-items-center">
                <button
                    x-data="{
                        async copyContent() {
                            try {
                                await navigator.clipboard.writeText(await message);
                                console.log('Content copied to clipboard');
                            } catch (err) {
                                console.error('Failed to copy: ', err);
                            }
                        }
                    }"
                    x-on:click="copyContent()">
                    <img src="{{ asset('img/icons/link-pr.svg') }}" width="40px" height="40px" alt="Link">
                </button>

                <span class="share-modal__item_title mt-2">Copy link</span>
            </div>
        </div>

        <button class="close-share-modal mb-2">Back</button>
    </div>
</div>

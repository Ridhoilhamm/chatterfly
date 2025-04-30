<style>
    .messenger-sendCard {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #fff;
        padding: 10px 15px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: center;
        z-index: 50;
        margin: 0;
    }

    #message-form {
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 768px;
        padding-right: 15px;
    }

    #message-form label {
        display: flex;
        align-items: center;
        cursor: pointer;
        color: #6b7280;
        font-size: 18px;
    }

    .upload-attachment {
        display: none;
    }

    .emoji-button {
        background: none;
        border: none;
        color: #6b7280;
        font-size: 18px;
        cursor: pointer;
    }

    .m-send {
        flex: 1;
        resize: none;
        border: 1px solid #d1d5db;
        border-radius: 20px;
        padding: 8px 12px;
        font-size: 14px;
        font-family: inherit;
        outline: none;
        height: 40px;
    }

    .send-button {
        background-color: #16a34a;
        border: none;
        color: white;
        padding: 8px 12px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .send-button:disabled,
    .upload-attachment:disabled,
    textarea[readonly],
    .emoji-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>

<div class="messenger-sendCard">


    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment"
                name="file"
                accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

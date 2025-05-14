<div>
    <div class="report-wrapper">
        <div class="report-form-container">
            @if (session()->has('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
    
            <form wire:submit.prevent="submit" class="report-form">
                <div class="form-group">
                    <textarea wire:model.defer="reason"
                    placeholder="Tulis alasan laporan..."
                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; resize: none; text-align: center;"></textarea>
          
                    @error('reason')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">Laporkan</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        textarea::placeholder {
        text-align: center;
    }
        .report-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 0 16px;
        }
    
        .report-form-container {
            width: 100%;
            max-width: 480px;
            margin-bottom: 16px;
        }
    
        .report-form {
            width: 100%;
        }
    
        .report-form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: none;
            box-sizing: border-box;
        }
    
        .report-form button {
            width: 100%;
            background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
    
        .report-form button:hover {
            opacity: 0.9;
        }
    
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 8px;
        }
    
        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</div>
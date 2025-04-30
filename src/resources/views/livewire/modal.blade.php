<div>
    @if($showModal)
    <div class="modal-overlay">
        <div class="modal-content">
            <button wire:click="closeModal" class="button-close">&times;</button>
            <table class="modal-table">
                <tr class="modal-table__row">
                    <th class="modal-table__title">お名前</th>
                    <td class="modal-table__item">{{ $contact->last_name }}&nbsp;{{ $contact->first_name }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">性別</th>
                    <td class="modal-table__item">
                        @if($contact->gender == 1)
                        男性
                        @elseif($contact->gender == 2)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">メールアドレス</th>
                    <td class="modal-table__item">{{ $contact->email }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">電話番号</th>
                    <td class="modal-table__item">{{ $contact->tel }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">住所</th>
                    <td class="modal-table__item">{{ $contact->address }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">建物名</th>
                    <td class="modal-table__item">{{ $contact->building }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">お問い合わせの種類</th>
                    <td class="modal-table__item">{{ $contact->category->content }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__title">お問い合わせ内容</th>
                    <td class="modal-table__item">{{ $contact->detail }}</td>
                </tr>
            </table>
            <form class="modal-form__delete" action="/admin" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <button wire:click="deleteContact" class="button-delete">削除</button>
            </div>
        </div>
    </div>
    @endif
</div>
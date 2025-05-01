<div>
    <!-- list table -->
    <table class="admin-table">
        <thead class="admin-table__header">
            <tr class="admin-table__row">
                <th class="admin-table__label-name">お名前</th>
                <th class="admin-table__label-gender">性別</th>
                <th class="admin-table__label-email">メールアドレス</th>
                <th class="admin-table__label-category">お問い合わせの種類</th>
                <th class="admin-table__label-button"></th>
            </tr>
        </thead>
        <tbody class="admin-table__body">
            @foreach($contacts as $c)
            <tr class="admin-table__row">
                <td class="admin-table__item-name">{{ $c->last_name }}&nbsp;{{ $c->first_name }}</td>
                <td class="admin-table__item-gender">
                    @if($c->gender == 1)
                    男性
                    @elseif($c->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td class="admin-table__item-email">{{ $c->email }}</td>
                <td class="admin-table__item-category">
                    {{ $c->category->content }}
                </td>
                <td class="admin-table__item-button">
                    <div class="admin-table__button-detail">
                        <button onclick="Livewire.emit('openModal', {{ $c->id }})" type="button" class="admin-table__button-modal">詳細
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- modal -->
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
            <div class="modal-form__delete">
                <button wire:click="deleteContact" class="button-delete">削除</button>
            </div>
        </div>
    </div>
    @endif
</div>
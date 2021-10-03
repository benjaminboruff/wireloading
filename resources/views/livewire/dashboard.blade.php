<div>
    <h1>Dashboard</h1>

    <main>
        <div>
            <div>
                <input wire:model="search" type="text" placeholder="Search transactions...">
            </div>
            <table class="">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>

                <tbody>
                @forelse($transactions as $transaction)
                    <tr wire:loading.class.delay="foobar">
                        <td> {{ $transaction->title }} </td>
                        <td> {{ $transaction->amount }} </td>
                        <td> {{ $transaction->status }} </td>
                        <td> {{ $transaction->date }} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <span>
                                No transactions found...
                            </span>
                        </td>

                    </tr>
                @endforelse

                </tbody>
            </table>

            <div>
                {{ $transactions->links() }}
            </div>

        </div>
    </main>
</div>

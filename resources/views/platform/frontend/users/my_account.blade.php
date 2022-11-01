@if($user->account_type === 2 && $user->user_type===2)

    @include('includes.platform.users.personal_account')

@endif

@if($user->user_type ===1 && $user->account_type ===2)

    @include('includes.platform.users.company_account')

@endif

@if($user->user_type===1 && $user->account_type === 1)

    @include('includes.platform.users.supplier_account')

@endif
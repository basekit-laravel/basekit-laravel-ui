<x-basekit-ui::container class="p-3" size="full">
    <x-basekit-ui::stack spacing="xl">
        <div class="text-center space-y-3">
            <h1 class="text-3xl font-bold">Basekit Laravel UI</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                A modular Laravel UI component library with Blade components, Tailwind 4 CSS, Alpine.js,
                full documentation, and a built-in style guide.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <x-basekit-ui::card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold mr-1">Form</h2>
                    </div>
                </x-slot>

                <x-basekit-ui::stack spacing="md">
                    <x-basekit-ui::input name="name" label="Name" placeholder="John Doe" icon="user" />

                    <x-basekit-ui::input name="email" type="email" label="Email" placeholder="john@example.com"
                        icon="envelope" />

                    <x-basekit-ui::select name="role" label="Role" :options="[
                        'developer' => 'Developer',
                        'designer' => 'Designer',
                        'manager' => 'Manager',
                    ]" />

                    <x-basekit-ui::textarea name="message" label="Message" placeholder="Your message here..." />


                    <x-basekit-ui::toggle name="terms_toggle" label="I agree to the terms and conditions"
                        :checked="true" variant="primary" />
                    <x-basekit-ui::button variant="primary" icon="check">
                        Submit
                    </x-basekit-ui::button>
                </x-basekit-ui::stack>
            </x-basekit-ui::card>

            <x-basekit-ui::card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold mr-1">Feedback</h2>
                    </div>
                </x-slot>

                <x-basekit-ui::stack spacing="md">
                    <x-basekit-ui::alert variant="success" title="Changes saved">
                        Your profile has been updated successfully.
                    </x-basekit-ui::alert>

                    <x-basekit-ui::progress value="30" max="100" label="Profile completion" variant="ghost" />
                    <x-basekit-ui::empty-state icon="inbox" title="No messages"
                        description="You have no new messages at the moment." />

                    <x-basekit-ui::spinner variant="primary" label="Loading..." />
                </x-basekit-ui::stack>
            </x-basekit-ui::card>

            <x-basekit-ui::card class="w-full max-w-lg" :is-padded="false">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold mr-1">Navigation</h2>
                    </div>
                </x-slot>
                <div class="p-4">
                    <x-basekit-ui::breadcrumb :items="[
                        ['label' => 'Home', 'url' => '#', 'icon' => 'home'],
                        ['label' => 'Dashboard', 'url' => '#', 'icon' => 'adjustments-horizontal'],
                        ['label' => 'Profile', 'url' => '#', 'active' => true, 'icon' => 'user'],
                    ]" />
                    <x-basekit-ui::tabs :items="[
                        ['value' => 'orders', 'label' => 'My Orders'],
                        ['value' => 'profile', 'label' => 'Profile'],
                        ['value' => 'settings', 'label' => 'Settings'],
                    ]" active="orders" class="mt-4">
                        <div class="mt-4">
                            <div x-show="activeTab === 'orders'" x-cloak>
                                <h2 class="text-lg font-semibold mb-4">My Orders</h2>

                                @php
                                    $myOrders = [
                                        ['id' => 1, 'item' => 'Laptop', 'status' => 'Shipped'],
                                        ['id' => 2, 'item' => 'Smartphone', 'status' => 'Processing'],
                                    ];
                                @endphp

                                <x-basekit-ui::grid cols="2" gap="sm" :responsive="false">
                                    @foreach ($myOrders as $order)
                                        <x-basekit-ui::card>
                                            <x-slot:header>
                                                <h3 class="font-semibold">Order #{{ $order['id'] }}</h3>
                                            </x-slot>

                                            <p class="text-slate-600">Item: {{ $order['item'] }}</p>
                                            <p class="text-slate-600">Status:
                                                <x-basekit-ui::badge :variant="$order['status'] === 'Shipped' ? 'success' : 'warning'">
                                                    {{ $order['status'] }}
                                                </x-basekit-ui::badge>
                                            </p>
                                        </x-basekit-ui::card>
                                    @endforeach
                                </x-basekit-ui::grid>
                                <div class="overflow-x-auto">
                                    <x-basekit-ui::pagination :current-page="1" :total-pages="5" :per-page="2"
                                        :total-items="10" class="mt-6 flex-wrap gap-2" />
                                </div>
                            </div>
                            <div x-show="activeTab === 'profile'" x-cloak>
                                <p class="text-slate-600">
                                    This is your profile tab. You can view and edit your personal information,
                                    change
                                    your
                                    password, and manage your account settings here.
                                </p>
                            </div>
                            <div x-show="activeTab === 'settings'" x-cloak>
                                <p class="text-slate-600">
                                    In the settings tab, you can customize your preferences, configure
                                    notifications,
                                    and
                                    adjust other application settings to suit your needs.
                                </p>
                            </div>
                        </div>
                    </x-basekit-ui::tabs>
                </div>
            </x-basekit-ui::card>

            <x-basekit-ui::card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold mr-1">Display</h2>
                    </div>
                </x-slot>
                <x-basekit-ui::stack spacing="md">
                    <x-basekit-ui::card class="overflow-hidden hover:shadow-lg transition-shadow duration-300"
                        :is-padded="false">
                        <img src="https://placehold.co/400" alt="Product" class="h-32 w-full object-cover">

                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <h3 class="text-lg font-semibold">ThinkPad Laptop</h3>
                                <p class="text-gray-600">
                                    A powerful and reliable laptop with a sleek design, perfect for work and
                                    entertainment.
                                </p>
                                <div class="flex items-center space-x-2">
                                    <span class="text-lg font-bold text-green-600">$999</span>
                                    <x-basekit-ui::badge variant="success">In Stock</x-basekit-ui::badge>
                                </div>
                                <div class="flex items-center space-x-2 overflow-x-auto">
                                    <x-basekit-ui::stat label="Rating" value="4.5" icon="star"
                                        variant="warning" />
                                    <x-basekit-ui::stat label="Reviews" value="120" icon="chat-bubble-oval-left"
                                        variant="primary" />
                                </div>
                            </div>
                        </div>

                        <x-slot:footer>
                            <x-basekit-ui::button variant="primary">Add to Cart</x-basekit-ui::button>
                        </x-slot:footer>
                    </x-basekit-ui::card>
                </x-basekit-ui::stack>
            </x-basekit-ui::card>
        </div>
    </x-basekit-ui::stack>
</x-basekit-ui::container>

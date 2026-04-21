<div class="space-y-10" x-data="{
    sections: (function() {
        var h = window.__bkHash || '';
        var open = function(key) { return !h || h === key; };
        return {
            alerts: open('alerts'),
            empty: open('empty'),
            spinners: open('spinners'),
            progress: open('progress'),
            skeletons: open('skeletons'),
            tooltips: open('tooltips'),
            toasts: open('toasts'),
        };
    })(),
    expandAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = true));
    },
    collapseAll() {
        Object.keys(this.sections).forEach((key) => (this.sections[key] = false));
    },
}">

    <x-basekit-ui::styleguide.section-controls />


    <!-- Alerts -->
    <x-basekit-ui::styleguide.section-toggle section="alerts" title="Alerts">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-3 max-w-xl">
                    <x-basekit-ui::alert variant="primary" title="Primary · Key update">This is a primary alert to highlight
                        key
                        information.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="secondary" title="Secondary · Neutral note">This is a neutral alert for
                        supporting
                        context.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="info" title="Info · Information">This is an informational alert to
                        highlight
                        something important.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="success" title="Success · Saved">Your changes have been saved
                        successfully.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="warning" title="Warning · Subscription expiring">Your subscription is
                        about to
                        expire.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="danger" title="Danger · Request failed">Something went wrong while
                        processing your
                        request.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="ghost" title="Ghost · Minimal notice">Just a lightweight note without a
                        filled background.</x-basekit-ui::alert>
                </div>
            </div>

            <!-- Custom Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Icon</h4>
                <div class="space-y-3 max-w-xl">
                    <x-basekit-ui::alert variant="success" icon="shield-check" title="Security Updated">Your account
                        security settings have been updated.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="danger" icon="lock-closed" title="Access Restricted">This resource is not
                        accessible with your current permissions.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="success" title="Custom SVG Icon">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </x-slot:icon>
                        This alert uses a custom SVG checkmark icon from the icon slot.
                    </x-basekit-ui::alert>
                </div>
            </div>

            <!-- Dismissible -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Dismissible</h4>
                <div class="space-y-3 max-w-xl">
                    <x-basekit-ui::alert variant="info" title="Announcement" :is-dismissible="true">Check out our new features
                        released today.</x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="warning" title="Temporary Notice" :is-dismissible="true">Scheduled maintenance
                        happening tonight.</x-basekit-ui::alert>
                </div>
            </div>

            <!-- With Actions -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">With Actions</h4>
                <div class="space-y-3 max-w-xl">
                    <x-basekit-ui::alert variant="info" title="Update Available">
                        A new version is available for download.
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="primary">Update Now</x-basekit-ui::button>
                            <x-basekit-ui::button size="sm" variant="ghost">Later</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::alert>
                    <x-basekit-ui::alert variant="danger" title="Confirm Action" :is-dismissible="true">
                        This action cannot be undone.
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="danger">Confirm</x-basekit-ui::button>
                            <x-basekit-ui::button size="sm" variant="secondary">Cancel</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::alert>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Empty States -->
    <x-basekit-ui::styleguide.section-toggle section="empty" title="Empty State">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-basekit-ui::empty-state variant="primary" size="sm" title="Primary · No projects"
                        description="Create your first project." icon="folder">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="primary">Create</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="secondary" size="sm" title="Secondary · No activity"
                        description="Your recent activity will appear here." icon="clock">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="secondary">Refresh</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="success" size="sm" title="Success · All caught up"
                        description="Everything is running smoothly." icon="check-circle">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="success">View logs</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="info" size="sm" title="Info · No messages"
                        description="When you receive messages, they will show up here." icon="chat-bubble-left-right">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="info">Open inbox</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="warning" size="sm" title="Warning · No backups"
                        description="Add a backup schedule." icon="exclamation-triangle">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="warning">Add schedule</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="danger" size="sm" title="Danger · Sync failed"
                        description="Try again to recover." icon="x-circle">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="danger">Retry</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="ghost" size="sm" title="Ghost · Nothing here yet"
                        description="Start by adding some content." icon="eye-slash">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="ghost">Dismiss</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>
                </div>
            </div>

            <!-- Custom Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Icon</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-basekit-ui::empty-state variant="primary" size="sm" title="Star icon"
                        description="A custom star SVG passed via the icon slot.">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                        </x-slot:icon>
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="primary">Learn more</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>

                    <x-basekit-ui::empty-state variant="secondary" size="sm" title="Upload icon"
                        description="A custom cloud upload SVG passed via the icon slot.">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M19.35 10.04A7.49 7.49 0 0012 4C9.11 4 6.6 5.64 5.35 8.04A5.994 5.994 0 000 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z" />
                            </svg>
                        </x-slot:icon>
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="secondary">Upload file</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>
                </div>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <x-basekit-ui::empty-state size="sm" title="Small empty state"
                        description="Compact layout for tight spaces." icon="inbox" />

                    <x-basekit-ui::empty-state size="md" title="Medium empty state"
                        description="Balanced layout for most pages." icon="inbox" />

                    <x-basekit-ui::empty-state size="lg" title="Large empty state"
                        description="Roomier layout for full pages." icon="inbox" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Spinners -->
    <x-basekit-ui::styleguide.section-toggle section="spinners" title="Spinners">
        <div class="space-y-6">
            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="grid grid-cols-3 md:grid-cols-5 gap-4 max-w-md">
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="xs" variant="secondary" />
                        <span class="text-xs text-slate-500">XS</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="sm" variant="secondary" />
                        <span class="text-xs text-slate-500">SM</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="secondary" />
                        <span class="text-xs text-slate-500">MD</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="lg" variant="secondary" />
                        <span class="text-xs text-slate-500">LG</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="xl" variant="secondary" />
                        <span class="text-xs text-slate-500">XL</span>
                    </div>
                </div>
            </div>

            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="primary" />
                        <span class="text-xs text-slate-500">Primary</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="secondary" />
                        <span class="text-xs text-slate-500">Secondary</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="success" />
                        <span class="text-xs text-slate-500">Success</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="warning" />
                        <span class="text-xs text-slate-500">Warning</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="danger" />
                        <span class="text-xs text-slate-500">Danger</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="info" />
                        <span class="text-xs text-slate-500">Info</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <x-basekit-ui::spinner size="md" variant="ghost" />
                        <span class="text-xs text-slate-500">Ghost</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-slate-700 rounded-md p-2">
                        <x-basekit-ui::spinner size="md" variant="white" />
                        <span class="text-xs text-slate-200">White</span>
                    </div>
                </div>
            </div>

            <!-- With Label -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">With Label</h4>
                <div class="space-y-3 max-w-sm">
                    <x-basekit-ui::spinner size="md" variant="primary" label="Loading data..." />
                    <x-basekit-ui::spinner size="sm" variant="secondary">Syncing changes...</x-basekit-ui::spinner>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Progress Bars -->
    <x-basekit-ui::styleguide.section-toggle section="progress" title="Progress Bars">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-3 max-w-sm">
                    <x-basekit-ui::progress value="20" variant="primary" label="Primary" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="35" variant="secondary" label="Secondary" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="55" variant="info" label="Info" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="75" variant="success" label="Success" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="90" variant="warning" label="Warning" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="100" variant="danger" label="Danger" :is-show-percentage="true" />
                    <x-basekit-ui::progress value="45" variant="ghost" label="Ghost" :is-show-percentage="true" />
                    <div class="bg-slate-700 rounded-md p-3">
                        <x-basekit-ui::progress value="65" variant="white" label="White" :is-show-percentage="true"
                            class="[--progress-bg:var(--color-slate-500)] [--progress-label-color:var(--color-slate-100)]" />
                    </div>
                </div>
            </div>

            <!-- Sizes -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Sizes</h4>
                <div class="space-y-3 max-w-sm">
                    <x-basekit-ui::progress value="40" size="sm" variant="primary" label="SM"
                        :is-show-percentage="true" />
                    <x-basekit-ui::progress value="40" size="md" variant="primary" label="MD"
                        :is-show-percentage="true" />
                    <x-basekit-ui::progress value="40" size="lg" variant="primary" label="LG"
                        :is-show-percentage="true" />
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Skeletons -->
    <x-basekit-ui::styleguide.section-toggle section="skeletons" title="Skeletons">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-3 max-w-sm">
                    <div class="space-y-2">
                        <p class="text-xs text-slate-500">Circle sizes</p>
                        <div class="flex items-end gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::skeleton variant="circle" size="sm" />
                                <span class="text-xs text-slate-500">SM</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::skeleton variant="circle" size="md" />
                                <span class="text-xs text-slate-500">MD</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <x-basekit-ui::skeleton variant="circle" size="lg" />
                                <span class="text-xs text-slate-500">LG</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs text-slate-500">Default (line blocks)</p>
                        <div class="space-y-1.5">
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">SM</span>
                                <x-basekit-ui::skeleton size="sm" class="w-1/3" />
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">MD</span>
                                <x-basekit-ui::skeleton size="md" class="w-2/3" />
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">LG</span>
                                <x-basekit-ui::skeleton size="lg" class="w-full" />
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xs text-slate-500">Text variant</p>
                        <div class="space-y-1.5">
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">SM</span>
                                <x-basekit-ui::skeleton variant="text" size="sm" lines="1" />
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">MD</span>
                                <x-basekit-ui::skeleton variant="text" size="md" lines="1" />
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs text-slate-500">LG</span>
                                <x-basekit-ui::skeleton variant="text" size="lg" lines="1" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Tooltips -->
    <x-basekit-ui::styleguide.section-toggle section="tooltips" title="Tooltips">
        <div class="space-y-6">
            <!-- Positions -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Positions</h4>
                <div class="flex flex-wrap items-center gap-8 p-8 bg-slate-50 rounded-lg">
                    <!-- Left -->
                    <x-basekit-ui::tooltip position="left" content="Left position">
                        <x-basekit-ui::button size="sm" variant="secondary">Left</x-basekit-ui::button>
                    </x-basekit-ui::tooltip>


                    <!-- Top -->
                    <x-basekit-ui::tooltip position="top" content="Top position">
                        <x-basekit-ui::button size="sm" variant="secondary">Top</x-basekit-ui::button>
                    </x-basekit-ui::tooltip>

                    <!-- Bottom -->
                    <x-basekit-ui::tooltip position="bottom" content="Bottom position">
                        <x-basekit-ui::button size="sm" variant="secondary">Bottom</x-basekit-ui::button>
                    </x-basekit-ui::tooltip>

                    <!-- Right -->
                    <x-basekit-ui::tooltip position="right" content="Right position">
                        <x-basekit-ui::button size="sm" variant="secondary">Right</x-basekit-ui::button>
                    </x-basekit-ui::tooltip>
                </div>
            </div>

            <!-- Triggers -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Triggers</h4>
                <div class="flex flex-wrap gap-6 p-6 bg-slate-50 rounded-lg">
                    <!-- Button -->
                    <x-basekit-ui::tooltip content="This is a button">
                        <x-basekit-ui::button size="sm">Hover Button</x-basekit-ui::button>
                    </x-basekit-ui::tooltip>

                    <!-- Link -->
                    <x-basekit-ui::tooltip content="More information">
                        <a href="#" class="text-primary-600 hover:text-primary-700 underline">
                            Hover Link
                        </a>
                    </x-basekit-ui::tooltip>

                    <!-- Text -->
                    <x-basekit-ui::tooltip content="Helpful context">
                        <span class="cursor-help border-b border-dashed border-slate-400">
                            Hover Text
                        </span>
                    </x-basekit-ui::tooltip>

                    <!-- Icon -->
                    <x-basekit-ui::tooltip content="Information icon">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-slate-500 cursor-help" />
                    </x-basekit-ui::tooltip>
                </div>
            </div>

            <!-- Custom Content -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Content</h4>
                <div class="p-6 bg-slate-50 rounded-lg">
                    <x-basekit-ui::tooltip position="right">
                        <x-basekit-ui::button size="sm" variant="ghost">Custom Content</x-basekit-ui::button>
                        <x-slot:content>
                            <div class="text-xs">
                                <p class="font-semibold">Tooltip Title</p>
                                <p class="mt-1">This is custom content inside the tooltip.</p>
                            </div>
                        </x-slot:content>
                    </x-basekit-ui::tooltip>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>

    <!-- Toasts -->
    <x-basekit-ui::styleguide.section-toggle section="toasts" title="Toasts">
        <div class="space-y-6">
            <!-- Variants -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Variants</h4>
                <div class="space-y-2.5 max-w-sm">
                    <x-basekit-ui::toast variant="primary" title="Primary update"
                        message="A key announcement for all users." :duration="0" />
                    <x-basekit-ui::toast variant="secondary" title="Secondary notice"
                        message="Background sync completed successfully." :duration="0" />
                    <x-basekit-ui::toast variant="success" title="Changes saved"
                        message="Your settings have been updated." :duration="0" />
                    <x-basekit-ui::toast variant="info" title="New update available"
                        message="Version 2.0 is ready to install." :duration="0" />
                    <x-basekit-ui::toast variant="warning" title="Storage almost full"
                        message="You're using 95% of your storage." :duration="0" />
                    <x-basekit-ui::toast variant="danger" title="Connection failed"
                        message="Unable to reach the server." :duration="0" />
                    <x-basekit-ui::toast variant="ghost" title="Ghost note"
                        message="This is a lightweight, low-emphasis toast." :duration="0" />
                </div>
            </div>

            <!-- Custom Icon -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Icon</h4>
                <div class="space-y-2.5 max-w-sm">
                    <!-- Using hero icon prop -->
                    <x-basekit-ui::toast variant="success" title="Upload complete"
                        message="3 files uploaded successfully." icon="cloud-arrow-up" :duration="0" />
                    <x-basekit-ui::toast variant="info" title="New message" message="You have a message from Sarah."
                        icon="envelope" :duration="0" />

                    <!-- Using icon slot for custom SVG -->
                    <x-basekit-ui::toast variant="success" title="Milestone reached"
                        message="You've completed 100 tasks!" :duration="0">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </x-slot:icon>
                    </x-basekit-ui::toast>
                </div>
            </div>

            <!-- Custom Content -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">Custom Content</h4>
                <div class="max-w-sm">
                    <x-basekit-ui::toast variant="success" title="Changes published" :duration="0">
                        Your post is now live. <a href="#" class="underline hover:no-underline font-medium">View
                            post</a>
                    </x-basekit-ui::toast>
                </div>
            </div>

            <!-- With Actions -->
            <div class="space-y-2">
                <h4 class="text-sm text-slate-500 font-medium">With Actions</h4>
                <div class="space-y-2.5 max-w-sm">
                    <x-basekit-ui::toast variant="warning" title="Connection lost" message="Reconnecting to server..."
                        :duration="0">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="ghost"
                                class="text-xs py-1 px-2">Retry</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::toast>

                    <x-basekit-ui::toast variant="info" title="Update available"
                        message="Version 2.0 is ready to install." :duration="0">
                        <x-slot:actions>
                            <x-basekit-ui::button size="sm" variant="primary" class="text-xs py-1 px-2">Install
                                now</x-basekit-ui::button>
                            <x-basekit-ui::button size="sm" variant="ghost"
                                class="text-xs py-1 px-2">Later</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::toast>
                </div>
            </div>
        </div>
    </x-basekit-ui::styleguide.section-toggle>
</div>

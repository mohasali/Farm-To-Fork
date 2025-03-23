<x-layout title = "Admin | Reports">
    <!-- User Detail Management -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary mb-8">Report Dashboard</h1>
        </div>
    </section>

    <section class="gap-4 p-6 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            <!-- Users -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Users</h2>
                <p>Total Users: {{ $data["users"] ?? 0 }}</p>
                <p>Total Administrators: {{ $data["admins"] ?? 0 }}</p>
            </div>

            <!-- Orders -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb- text-primary">Orders</h2>
                <p>Total Orders: {{ $data["numberOfOrders"] ?? 0 }}</p> <!-- Number of orders -->
                <p>Average Order Value: £{{ number_format($data["avgOrderValue"] ?? 0, 2) }}</p> <!-- Average order value -->
                <p>Returned Orders: {{ $data["noReturnedOrders"] ?? 0 }}</p> <!-- Number of returned orders -->
                <p>Return Rate: {{ $data["returnRate"] ?? 0 }}%</p> <!-- Return rate -->
            </div>

            <!-- Sales / revenue -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Sales</h2>
                <p>Total Revenue: £{{ number_format($data["revenue"] ?? 0, 2) }}</p> <!-- Total revenue -->
            </div>

            <!-- Inventory -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Inventory</h2>
                <p>Total Inventory Value: £{{ number_format($data["inventoryValue"] ?? 0, 2) }}</p> <!-- Total inventory value -->
                <p>Total Inventory Items: {{ $data["inventoryItems"] ?? 0 }}</p> <!-- Total inventory items -->
            </div>

            <!-- Customer Support -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Customer Support</h2>
                <p>Total Enquiries: {{ $data["enquiries"] ?? 0 }}</p> <!-- Number of enquiries -->
            </div>

            <!-- Reviews -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Product Review</h2>
                <p>Total Product Reviews: {{ $data["boxReviews"] ?? 0 }}</p> <!-- Number of product reviews -->
                <p>Average Product Rating: {{ number_format($data["avgBoxRating"] ?? 0, 1) }}</p> <!-- Average product rating -->
            </div>

            <!-- Site Reviews -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-primary">Site Review</h2>
                <p>Total Site Reviews: {{ $data["siteReviews"] ?? 0 }}</p> <!-- Number of site reviews -->
                <p>Average Site Rating: {{ number_format($data["avgSiteRating"] ?? 0, 1) }}</p> <!-- Average site rating -->
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4 text-primary">Category Sales</h2>
                <canvas id="categoryChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const data = @json($data);

                const categoryCtx = document.getElementById("categoryChart").getContext('2d');
                new Chart(categoryCtx, {
                    type: "pie",
                    data: {
                        labels: Object.keys(data.categorySales || {}),
                        datasets: [{
                            label: "# of Sales by Type",
                            data: Object.values(data.categorySales || {}),
                            borderWidth: 1,
                        }],
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Sales by Box Type'
                            }
                        }
                    },
                });
            });
        </script>
    </div>
</x-layout>
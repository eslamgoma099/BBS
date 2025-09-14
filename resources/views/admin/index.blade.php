@extends('admin.layouts.admin-app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ setting('site_name') }} - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Modern Dashboard Styles -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
        }

        .main-container {
            padding: 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gradient);
        }

        .stat-card.success::before { background: linear-gradient(90deg, var(--success-color), #059669); }
        .stat-card.danger::before { background: linear-gradient(90deg, var(--danger-color), #dc2626); }
        .stat-card.warning::before { background: linear-gradient(90deg, var(--warning-color), #d97706); }
        .stat-card.info::before { background: linear-gradient(90deg, var(--info-color), #2563eb); }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-icon.primary { background: linear-gradient(135deg, #667eea, #764ba2); }
        .stat-icon.success { background: linear-gradient(135deg, var(--success-color), #059669); }
        .stat-icon.danger { background: linear-gradient(135deg, var(--danger-color), #dc2626); }
        .stat-icon.warning { background: linear-gradient(135deg, var(--warning-color), #d97706); }
        .stat-icon.info { background: linear-gradient(135deg, var(--info-color), #2563eb); }

        .stat-title {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .stat-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .stat-link:hover {
            color: var(--text-primary);
        }

        .welcome-section {
            background: var(--primary-gradient);
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .welcome-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-modern {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-outline-modern {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: var(--text-primary);
        }

        .btn-outline-modern:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            color: var(--text-primary);
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .recent-activity {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--card-border);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .activity-content h6 {
            margin: 0 0 4px 0;
            font-weight: 600;
            color: var(--text-primary);
        }

        .activity-content p {
            margin: 0;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .activity-time {
            font-size: 12px;
            color: var(--text-muted);
            margin-left: auto;
        }

        .dashboard-header {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 24px;
            }

            .welcome-section {
                padding: 24px;
            }

            .welcome-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="main-container">

        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="welcome-content">
                <h1 class="welcome-title">Welcome back, Admin!</h1>
                <p class="welcome-subtitle">Here's what's happening with {{ setting('site_name') }} today</p>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">

            @if(check_permission('count-customer'))
            <div class="stat-card primary">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-title">Total Customers</div>
                <div class="stat-value">{{ number_format($users ?? 0) }}</div>
                <a href="@if(check_permission('only-active')){{ route('admin.users.activ-users') }}@else{{ route('admin.users.index') }}@endif" class="stat-link">
                    View all customers →
                </a>
            </div>
            @endif

            @if (check_permission('online-users'))
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-title">Online Customers</div>
                <div class="stat-value pulse">{{ number_format($online_users ?? 0) }}</div>
                <a href="{{ route('admin.online-users') }}" class="stat-link">
                    View online users →
                </a>
            </div>
            @endif

            @if (check_permission('view-leads'))
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="stat-title">Total Leads</div>
                <div class="stat-value">{{ number_format($leads ?? 0) }}</div>
                <a href="{{ route('admin.users.leads') }}" class="stat-link">
                    Manage leads →
                </a>
            </div>
            @endif

            @if(check_permission('view-withdrawals'))
            <div class="stat-card danger">
                <div class="stat-icon danger">
                    <i class="fas fa-arrow-up"></i>
                </div>
                <div class="stat-title">Pending Withdrawals</div>
                <div class="stat-value">{{ number_format($p_withdrawals ?? 0) }}</div>
                <a href="{{ route('admin.withdrawals.index') }}?status=0" class="stat-link">
                    Process withdrawals →
                </a>
            </div>
            @endif

            @if(check_permission('view-deposits'))
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-arrow-down"></i>
                </div>
                <div class="stat-title">Pending Deposits</div>
                <div class="stat-value">{{ number_format($p_deposits ?? 0) }}</div>
                <a href="{{ route('admin.deposits.index') }}?status=0" class="stat-link">
                    Process deposits →
                </a>
            </div>
            @endif

            @if(check_permission('view-KYC-Verifications'))
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="stat-title">KYC Verifications</div>
                <div class="stat-value">--</div>
                <a href="{{ route('admin.users.ids') }}" class="stat-link">
                    Review KYC →
                </a>
            </div>
            @endif
        </div>

        <!-- Action Buttons Section -->
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header">
                    <h2 class="section-title">Quick Actions</h2>
                    <div class="action-buttons">
                        @if(check_permission('view-customers'))
                        <a href="{{ route('admin.users.index') }}" class="btn-modern btn-primary-modern">
                            <i class="fas fa-users"></i>
                            Manage Users
                        </a>
                        @endif

                        @if(check_permission('view-leads'))
                        <a href="{{ route('admin.users.leads') }}" class="btn-modern btn-outline-modern">
                            <i class="fas fa-phone"></i>
                            View Leads
                        </a>
                        @endif

                        @if(check_permission('view-deposits'))
                        <a href="{{ route('admin.deposits.index') }}" class="btn-modern btn-outline-modern">
                            <i class="fas fa-money-bill-wave"></i>
                            Deposits
                        </a>
                        @endif

                        @if(check_permission('view-withdrawals'))
                        <a href="{{ route('admin.withdrawals.index') }}" class="btn-modern btn-outline-modern">
                            <i class="fas fa-hand-holding-usd"></i>
                            Withdrawals
                        </a>
                        @endif

                        @if(check_permission('view-assets'))
                        <a href="{{ route('admin.currencies.index') }}" class="btn-modern btn-outline-modern">
                            <i class="fas fa-coins"></i>
                            Assets
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Recent Activity</h2>
                <div class="recent-activity">
                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <h6>New Customer Registration</h6>
                            <p>A new customer has registered and is awaiting verification</p>
                        </div>
                        <div class="activity-time">2 min ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Pending Deposit</h6>
                            <p>A deposit is awaiting approval</p>
                        </div>
                        <div class="activity-time">15 min ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Withdrawal Request</h6>
                            <p>Customer requested withdrawal</p>
                        </div>
                        <div class="activity-time">1 hour ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon info">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="activity-content">
                            <h6>Trading Activity</h6>
                            <p>Increased trading volume detected in the last hour</p>
                        </div>
                        <div class="activity-time">2 hours ago</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add interactive effects
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Animate numbers on page load
        document.addEventListener('DOMContentLoaded', function() {
            const statValues = document.querySelectorAll('.stat-value');

            statValues.forEach(stat => {
                const finalValue = parseInt(stat.textContent.replace(/,/g, ''));
                if (!isNaN(finalValue)) {
                    let currentValue = 0;
                    const increment = finalValue / 50;
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            stat.textContent = finalValue.toLocaleString();
                            clearInterval(timer);
                        } else {
                            stat.textContent = Math.floor(currentValue).toLocaleString();
                        }
                    }, 20);
                }
            });
        });

        // Add real-time updates simulation
        setInterval(() => {
            const onlineUsers = document.querySelector('.pulse');
            if (onlineUsers) {
                // Simulate small random changes in online users
                const currentValue = parseInt(onlineUsers.textContent.replace(/,/g, ''));
                const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                const newValue = Math.max(0, currentValue + change);
                onlineUsers.textContent = newValue.toLocaleString();
            }
        }, 30000); // Update every 30 seconds
    </script>

</body>
</html>

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.pricing-switcher-container').forEach(function(container) {
        const id = container.id.replace('pricing-switcher-container-', '');
        const defaultChoice = container.getAttribute('data-default');
        const oneTimeInput = document.getElementById('one-time-' + id);
        const monthlyInput = document.getElementById('monthly-' + id);
        const quarterlyInput = document.getElementById('quarterly-' + id);
        const halfYearlyInput = document.getElementById('half-yearly-' + id);
        const yearlyInput = document.getElementById('yearly-' + id);
        const oneTimePlans = document.querySelectorAll('.one-time-plan.' + id);
        const monthlyPlans = document.querySelectorAll('.monthly-plan.' + id);
        const quarterlyPlans = document.querySelectorAll('.quarterly-plan.' + id);
        const halfYearlyPlans = document.querySelectorAll('.half-yearly-plan.' + id);
        const yearlyPlans = document.querySelectorAll('.yearly-plan.' + id);

        function hideAllPlans() {
            oneTimePlans.forEach(plan => plan.classList.add('hidden'));
            monthlyPlans.forEach(plan => plan.classList.add('hidden'));
            quarterlyPlans.forEach(plan => plan.classList.add('hidden'));
            halfYearlyPlans.forEach(plan => plan.classList.add('hidden'));
            yearlyPlans.forEach(plan => plan.classList.add('hidden'));
        }

        function showPlans(plans) {
            hideAllPlans();
            plans.forEach(plan => plan.classList.remove('hidden'));
        }

        if (oneTimeInput) {
            oneTimeInput.addEventListener('change', function() {
                if (this.checked) {
                    showPlans(oneTimePlans);
                }
            });
        }

        if (monthlyInput) {
            monthlyInput.addEventListener('change', function() {
                if (this.checked) {
                    showPlans(monthlyPlans);
                }
            });
        }

        if (quarterlyInput) {
            quarterlyInput.addEventListener('change', function() {
                if (this.checked) {
                    showPlans(quarterlyPlans);
                }
            });
        }

        if (halfYearlyInput) {
            halfYearlyInput.addEventListener('change', function() {
                if (this.checked) {
                    showPlans(halfYearlyPlans);
                }
            });
        }

        if (yearlyInput) {
            yearlyInput.addEventListener('change', function() {
                if (this.checked) {
                    showPlans(yearlyPlans);
                }
            });
        }

        // Default state
        switch (defaultChoice) {
            case 'monthly':
                if (monthlyInput) {
                    monthlyInput.checked = true;
                    showPlans(monthlyPlans);
                }
                break;
            case 'quarterly':
                if (quarterlyInput) {
                    quarterlyInput.checked = true;
                    showPlans(quarterlyPlans);
                }
                break;
            case 'half_yearly':
                if (halfYearlyInput) {
                    halfYearlyInput.checked = true;
                    showPlans(halfYearlyPlans);
                }
                break;
            case 'yearly':
                if (yearlyInput) {
                    yearlyInput.checked = true;
                    showPlans(yearlyPlans);
                }
                break;
            default:
                if (oneTimeInput) {
                    oneTimeInput.checked = true;
                    showPlans(oneTimePlans);
                }
        }
    });
});

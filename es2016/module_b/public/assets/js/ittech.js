function removeQuestion(ev) {
    ev.preventDefault();
    ev.target.closest('.three.fields').remove();
}
function addQuestion(ev) {
    if (ev) ev.preventDefault();
    const el = document.getElementById('baseQuestion').cloneNode(true)
    el.id = '';

    document.getElementById('questionContainer').appendChild(el);
}

if (document.getElementById('employees') !== null) {
    window.employees = new Vue({
        el: '#employees',
        data: {
            name: '',
            company: '',
            employees: [],
        },
        mounted() {
            const employees = this.$el.querySelectorAll('#employee-container > .item');

            for (let emp of employees) {
                this.employees.push(emp);
            }
        },
        methods: {
            // Test string for needle; spaces and other characters between searched characters are allowed.
            // For example: "ada" matches "yolAnDA wright", "ADAm elliott jr." and "megAn DAvis", but not "gAil fernAnDez" or "sue roberson"
            contains(needle, haystack) {
                if (!needle) return true;

                needle = needle.toLowerCase();
                haystack = haystack.toLowerCase();
                let pos = 0;
                for (let i = 0; i < haystack.length; i++) {
                    if (needle[pos] === haystack[i]) pos++;

                    if (pos === needle.length) return true;
                }

                return false;
            },
            updateList() {
                this.employees.forEach(emp => {
                    const show = this.contains(this.name, emp.dataset.name) && this.contains(this.company, emp.dataset.company);

                    emp.style.display = show ? 'inline-block' : 'none';
                })
            }
        },
        watch: {
            name() {
                this.updateList();
            },
            company() {
                this.updateList();
            }
        }
    })
}

@props(['name'])

<script>
    $(document).ready(function () {
        $(".date").pDatepicker({
            "inline": false,
            "format": "LL",
            "viewMode": "day",
            "initialValue": true,
            "minDate": 1734294010847,
            "maxDate": 1735244410852,
            "autoClose": false,
            "position": "auto",
            "altFormat": "LL",
            "altField": "#altfieldExample",
            "onlyTimePicker": false,
            "onlySelectOnDate": true,
            "calendarType": "persian",
            "inputDelay": 800,
            "observer": false,
            "calendar": {
                "persian": {
                    "locale": "fa",
                    "showHint": true,
                    "leapYearMode": "algorithmic"
                },
                "gregorian": {
                    "locale": "fa",
                    "showHint": true
                }
            },
            "navigator": {
                "enabled": false,
                "scroll": {
                    "enabled": false
                },
                "text": {
                    "btnNextText": "<",
                    "btnPrevText": ">"
                }
            },
            "toolbox": {
                "enabled": true,
                "calendarSwitch": {
                    "enabled": false,
                    "format": "MMMM"
                },
                "todayButton": {
                    "enabled": true,
                    "text": {
                        "fa": "امروز",
                        "en": "Today"
                    }
                },
                "submitButton": {
                    "enabled": true,
                    "text": {
                        "fa": "تایید",
                        "en": "Submit"
                    }
                },
                "text": {
                    "btnToday": "امروز"
                }
            },
            "timePicker": {
                "enabled": false,
                "step": 1,
                "hour": {
                    "enabled": false,
                    "step": null
                },
                "minute": {
                    "enabled": false,
                    "step": null
                },
                "second": {
                    "enabled": false,
                    "step": null
                },
                "meridian": {
                    "enabled": false
                }
            },
            "dayPicker": {
                "enabled": true,
                "titleFormat": "YYYY MMMM"
            },
            "monthPicker": {
                "enabled": true,
                "titleFormat": "YYYY"
            },
            "yearPicker": {
                "enabled": true,
                "titleFormat": "YYYY"
            },
            "responsive": true,

            // تنظیم رویداد onSelect
            "onSelect": function (unixDate) {
                let selectedDate = $(".date").val(); // مقدار انتخاب شده
                @this.
                set('{{ $name }}', selectedDate); // ارسال مقدار به Livewire
            }
        });
    });
</script>

<input type="text" name="{{ $name }}" id="{{ $name }}" wire:model.defer="{{ $name }}" class="date" {{ $attributes }}>
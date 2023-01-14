<div>
    <style>
        .toggle-checkbox:checked {
          right: 0; 
        }
    </style>

    <div class="flex gap-1">
        <div>
            <p>Basic</p>
        </div>
        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">  
            <input wire:model="active" type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
        <div>
            <p>Pro</p>
        </div>
    </div>
        {{-- <livewire:toggle-button :active="$active"/> --}}
        {{-- {{ $active }} --}}
   <div style="height: 75vh; width: auto;">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container" style="height: 100%; width: 100%;">
            <div id="tradingview_6c975" class="" style="height: 100%; width: 100%;"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Chart</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            new TradingView.widget(
            {
            "autosize": true,
            "symbol": "{{ $viewSymbol }}",
            "interval": "D",
            "timezone": "Europe/London",
            "theme": "dark",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "details": true,
            "studies": [
            "MAExp@tv-basicstudies",
            "RSI@tv-basicstudies"
            ],
            "show_popup_button": true,
            "popup_width": "1000",
            "popup_height": "1000",
            "container_id": "tradingview_6c975"
        }
            );
            </script>
        </div>
        <!-- TradingView Widget END -->
</div>
<div style="height: 75vh; width: auto;">
        <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="height: 100%; width: 100%;">
    <div id="technical-analysis-chart-demo" style="height: 100%; width: 100%;"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    new TradingView.widget(
    {
    "container_id": "technical-analysis-chart-demo",
    "width": "100%",
    "height": "100%",
    "autosize": true,
    "symbol": "{{ $viewSymbol }}",
    "interval": "D",
    "timezone": "exchange",
    "theme": "dark",
    "style": "1",
    "toolbar_bg": "#f1f3f6",
    "withdateranges": true,
    "hide_side_toolbar": false,
    "allow_symbol_change": true,
    "save_image": false,
    "studies": [
      "ROC@tv-basicstudies",
      "StochasticRSI@tv-basicstudies",
      "MASimple@tv-basicstudies"
    ],
    "show_popup_button": true,
    "popup_width": "1000",
    "popup_height": "650",
    "locale": "en"
  }
    );
    </script>
  </div>
  <!-- TradingView Widget END -->
   </div>
     
</div>

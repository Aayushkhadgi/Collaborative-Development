class Slide2 {
  constructor() {
      this.trekButton = document.getElementById('trekButton');
      this.includeExcludeButton = document.getElementById('includeExcludeButton');
      this.mapButton = document.getElementById('mapButton');
      this.shopButton = document.getElementById('shopButton');
      this.trekPanel = document.getElementById('trekPanel');
      this.includeExcludePanel = document.getElementById('includeExcludePanel');
      this.mapPanel = document.getElementById('mapPanel');
      this.packagePanel = document.getElementById('packagePanel');
      
      this.trekButton.addEventListener('click', () => {
          this.togglePanel(this.trekPanel);
          this.closePanel(this.includeExcludePanel);
          this.closePanel(this.mapPanel);
          this.closePanel(this.packagePanel);
      });
      
      this.includeExcludeButton.addEventListener('click', () => {
          this.togglePanel(this.includeExcludePanel);
          this.closePanel(this.trekPanel);
          this.closePanel(this.mapPanel);
          this.closePanel(this.packagePanel);
      });

      this.mapButton.addEventListener('click', () => {
          this.togglePanel(this.mapPanel);
          this.closePanel(this.trekPanel);
          this.closePanel(this.includeExcludePanel);
          this.closePanel(this.packagePanel);
      });

      this.shopButton.addEventListener('click', () => {
          this.togglePanel(this.packagePanel);
          this.closePanel(this.trekPanel);
          this.closePanel(this.includeExcludePanel);
          this.closePanel(this.mapPanel);
      });
  }
  
  togglePanel(panel) {
      panel.style.display = (panel.style.display === 'none') ? 'flex' : 'none';
  }
  
  closePanel(panel) {
      panel.style.display = 'none';
  }
}

// Instantiate the Slide2 class
const slide2 = new Slide2();
<style>
:root {
  --bg-primary: #1a1a2e;
  --bg-secondary: #16213e;
  --bg-card: rgba(255, 255, 255, 0.05);
  --border-card: rgba(255, 255, 255, 0.1);
  --text-primary: #ffffff;
  --text-secondary: #a0a0a0;
  --text-muted: #666;
  --gradient-text: linear-gradient(135deg, #64ffda 0%, #448aff 50%, #7c4dff 100%);
  --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --accent: #64ffda;
  --accent-hover: #4fd3b3;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Inter", sans-serif;
  background: var(--bg-primary);
  color: var(--text-primary);
  line-height: 1.6;
  overflow-x: hidden;
}

a {
  text-decoration: none;
}

.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  background: rgba(26, 26, 46, .8);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid var(--border-card);
  padding: 10px 0;
}

.nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 40px;
}

.logo {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 24px;
  font-weight: 700;
  background: var(--gradient-text);
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(0, 0, 0, 0);
  background-clip: text;
}

.banner__logo {
  display: inline-block;
  margin: 0 6px 0 3px;
  width: 40px;
  height: 45px;
  background-color: #79d9d9;
  -webkit-mask: url(/assets/img/logo_re.svg) no-repeat center;
  mask: url(/assets/img/logo_re.svg) no-repeat center;
}

.lang-switch {
  display: flex;
  gap: 8px;
}

.lang-btn {
  background: rgba(0, 0, 0, 0);
  border: 1px solid var(--border-card);
  color: var(--text-secondary);
  padding: 8px 12px;
  border-radius: 6px;
  cursor: pointer;
  transition: all .3s ease;
  font-size: 14px;
}

.lang-btn.active,
.lang-btn:hover {
  border-color: var(--accent);
  color: var(--accent);
  background: rgba(100, 255, 218, .1);
}

.main {
  padding-top: 80px;
  max-width: 1200px;
  margin: 0 auto;
  padding-left: 40px;
  padding-right: 40px;
}

.banner {
  padding: 60px 0 80px;
  text-align: left;
  position: relative;
}

.banner-subtitle {
  position: relative;
  z-index: 2;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-secondary);
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 20px;
}

.banner-title {
  position: relative;
  z-index: 2;
  font-size: clamp(65px, 5vw, 70px);
  font-weight: 800;
  line-height: 1;
  background: var(--gradient-text);
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(0, 0, 0, 0);
  background-clip: text;
  margin-bottom: 30px;
}

.cta-button {
  position: relative;
  z-index: 2;
  display: inline-block;
  padding: 16px 32px;
  background: rgba(0, 0, 0, 0);
  border: 2px solid var(--accent);
  color: var(--accent);
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 16px;
  letter-spacing: .5px;
  text-transform: uppercase;
  transition: all .3s ease;
  position: relative;
  overflow: hidden;
}

.banner img {
  position: absolute;
  z-index: 0;
  transform: skewX(-10deg);
  right: 0;
  top: 50%;
  margin-top: -100px;
}
</style>
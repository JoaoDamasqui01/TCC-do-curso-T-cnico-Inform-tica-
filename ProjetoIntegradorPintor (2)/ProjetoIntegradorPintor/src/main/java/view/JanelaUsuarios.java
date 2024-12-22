package view;

import model.Usuarios;
import dao.UsuariosDao;
import util.JPAUtil;
import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import static java.lang.Long.parseLong;


public class JanelaUsuarios implements ActionListener {
    JButton btCadastrar, btCancelar;
    JLabel lbNomeCompleto, lbSenha, lbCpf;
    TextField tfNomeCompleto, tfCpf;
    JPasswordField pfSenha;


    public JanelaUsuarios() {

        JFrame janela = new JFrame("cadastro de Usuário");
        janela.setSize(290, 210);
        janela.setLocationRelativeTo((Component) null);
        janela.setLayout(new GridLayout(4,3, 20, 10));

        JMenuBar JmBarra = new JMenuBar();
        janela.setJMenuBar(JmBarra);

        lbNomeCompleto = new JLabel("Nome:");
        lbSenha = new JLabel("Senha:");
        lbCpf = new JLabel("CPF:");
        tfNomeCompleto = new TextField(20);
        pfSenha = new JPasswordField(15);
        tfCpf = new TextField(20);
        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");


        janela.add(lbNomeCompleto);
        janela.add(tfNomeCompleto);
        janela.add(lbCpf);
        janela.add(tfCpf);
        janela.add(lbSenha);
        janela.add(pfSenha);
        janela.add(btCadastrar);
        janela.add(btCancelar);

        btCadastrar.addActionListener(this);
        btCancelar.addActionListener(this);


        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE);
    }


    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == btCadastrar) {
            String nomeCompleto = tfNomeCompleto.getText();
            long cpf = Long.parseLong(tfCpf.getText());
            long senha = Long.parseLong(pfSenha.getText());
            Usuarios usuario = new Usuarios(nomeCompleto, cpf, senha);
            // conectar com o banco de dados
            EntityManager em = JPAUtil.getEntityManager();
            UsuariosDao usuariosDao = new UsuariosDao(em);
            em.getTransaction().begin();
            usuariosDao.cadastrar(usuario);
            em.getTransaction().commit();
            em.close();
            JOptionPane.showMessageDialog(null, "Cadastro Realizado com sucesso");
        }
        tfNomeCompleto.setText(" ");
        tfCpf.setText(" ");
        pfSenha.setText(" ");
    }
}
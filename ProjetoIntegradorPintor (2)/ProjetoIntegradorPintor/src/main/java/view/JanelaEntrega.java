package view;

import dao.EntregasDao;
import dao.FornecedoresDao;
import model.Entregas;
import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class JanelaEntrega implements ActionListener {
    JButton btCadastrar, btCancelar;
    JLabel lbVeiculo, lbPlaca, lbModelo;
    TextField tfVeiculo, tfPlaca, tfModelo;

    public JanelaEntrega(){
        JFrame janela = new JFrame("cadastro de Veiculo");
        janela.setSize(300, 200);
        janela.setLocationRelativeTo((Component) null);
        janela.setLayout(new GridLayout(4,3, 20, 10));

        JMenuBar JmBarra = new JMenuBar();
        janela.setJMenuBar(JmBarra);

        lbVeiculo = new JLabel("Veiculo:");
        lbModelo = new JLabel("Modelo:");
        lbPlaca = new JLabel("Placa:");
        tfVeiculo = new TextField(20);
        tfPlaca = new TextField(20);
        tfModelo = new TextField(20);
        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");

        janela.add(lbVeiculo);
        janela.add(tfVeiculo);
        janela.add(lbPlaca);
        janela.add(tfPlaca);
        janela.add(lbModelo);
        janela.add(tfModelo);
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
            String veiculo = tfVeiculo.getText();
            String modelo = tfModelo.getText();
            String placa = tfPlaca.getText();

            Entregas entregas = new Entregas(veiculo, placa, modelo);;
            EntityManager em = JPAUtil.getEntityManager();
            EntregasDao entregasDao = new EntregasDao(em);
            em.getTransaction().begin();
            entregasDao.cadastrar(entregas);
            em.getTransaction().commit();
            em.close();
            JOptionPane.showMessageDialog(null, "Cadastro Realizado com sucesso");
        }
        tfVeiculo.setText(" ");
        tfModelo.setText(" ");
        tfPlaca.setText(" ");
    }
}
